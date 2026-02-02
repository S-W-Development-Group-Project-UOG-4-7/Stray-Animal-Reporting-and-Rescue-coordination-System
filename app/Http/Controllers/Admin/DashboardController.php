<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use App\Models\Animal;
use App\Models\Rescue;
use App\Models\AnimalReport;
use App\Models\Donation;
use App\Models\AdoptionRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_reports' => Report::count(),
            'total_animals' => Animal::count(),
            'total_rescues' => Rescue::count(),
            'total_animal_reports' => AnimalReport::count(),
            'total_donations' => Donation::sum('amount'),
            'pending_adoptions' => AdoptionRequest::where('status', 'Pending')->count(),
        ];

        $recentUsers = User::latest()->limit(5)->get();
        $recentReports = AnimalReport::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentReports'));
    }
}
