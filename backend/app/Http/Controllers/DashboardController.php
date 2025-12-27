<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Animal;
use App\Models\Rescue;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch pending reports (not yet assigned)
        $pendingReports = Report::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Fetch active assignments (all assigned reports)
        $activeAssignments = Report::whereIn('status', ['assigned', 'in_progress'])
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        // Fetch statistics
        $stats = [
            'total_reports' => Report::count(),
            'pending_reports' => Report::where('status', 'pending')->count(),
            'active_assignments' => Report::whereIn('status', ['assigned', 'in_progress'])->count(),
            'completed_today' => Report::where('status', 'completed')
                ->whereDate('updated_at', today())
                ->count(),
            'urgent_cases' => Report::where('status', 'pending')
                ->where('created_at', '>', now()->subHours(2))
                ->count(),
            'animals_in_shelter' => Animal::whereIn('status', ['Available', 'Rescued'])->count(),
        ];

        // Fetch recent rescues
        $recentRescues = Rescue::orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        return view('rescue-team', compact('pendingReports', 'activeAssignments', 'stats', 'recentRescues'));
    }
}

