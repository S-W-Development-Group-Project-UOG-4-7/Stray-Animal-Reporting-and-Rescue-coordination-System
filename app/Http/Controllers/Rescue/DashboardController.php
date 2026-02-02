<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnimalReport;
use App\Models\Animal;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingReports = AnimalReport::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $activeAssignments = AnimalReport::whereIn('status', ['assigned', 'in_progress'])
            ->where('assigned_to', auth()->id())
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        $stats = [
            'total_reports' => AnimalReport::count(),
            'pending_reports' => AnimalReport::where('status', 'pending')->count(),
            'active_assignments' => AnimalReport::whereIn('status', ['assigned', 'in_progress'])->count(),
            'completed_today' => AnimalReport::where('status', 'completed')
                ->whereDate('updated_at', today())
                ->count(),
            'urgent_cases' => AnimalReport::where('status', 'pending')
                ->where('created_at', '>', now()->subHours(2))
                ->count(),
            'animals_in_shelter' => Animal::whereIn('status', ['Available', 'Rescued'])->count(),
        ];

        $recentRescues = AnimalReport::whereIn('status', ['rescued', 'completed', 'in_progress'])
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        return view('rescue.dashboard', compact('pendingReports', 'activeAssignments', 'stats', 'recentRescues'));
    }
}
