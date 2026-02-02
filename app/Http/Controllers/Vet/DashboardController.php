<?php

namespace App\Http\Controllers\Vet;

use App\Http\Controllers\Controller;
use App\Models\VetAppointment;
use App\Models\AnimalHealthRecord;
use App\Models\Animal;

class DashboardController extends Controller
{
    public function index()
    {
        $vet = auth()->user()->veterinarian;

        if (!$vet) {
            // Handle case where user is a vet role but has no profile
            // For now, return empty view or redirect to create profile
            return view('vet.dashboard', [
                'upcomingAppointments' => collect(),
                'recentRecords' => collect(),
                'stats' => [
                    'total_appointments' => 0,
                    'upcoming' => 0,
                    'completed' => 0,
                    'total_records' => 0,
                    'animals_in_care' => 0,
                ]
            ]);
        }

        $upcomingAppointments = VetAppointment::with(['animal', 'veterinarian'])
            ->where('veterinarian_id', $vet->id)
            ->where('status', 'scheduled')
            ->where('appointment_date', '>=', now())
            ->orderBy('appointment_date')
            ->limit(5)
            ->get();

        $recentRecords = AnimalHealthRecord::with(['animal', 'veterinarian'])
            ->where('veterinarian_id', $vet->id)
            ->latest()
            ->limit(5)
            ->get();

        $stats = [
            'total_appointments' => VetAppointment::where('veterinarian_id', $vet->id)->count(),
            'upcoming' => VetAppointment::where('veterinarian_id', $vet->id)->where('status', 'scheduled')->where('appointment_date', '>=', now())->count(),
            'completed' => VetAppointment::where('veterinarian_id', $vet->id)->where('status', 'completed')->count(),
            'total_records' => AnimalHealthRecord::where('veterinarian_id', $vet->id)->count(),
            // Animals in care is global stat for context, or could be linked to vet's active patients. 
            // Let's keep it global for now or filter if we had a patient list.
            'animals_in_care' => Animal::whereIn('status', ['In Treatment', 'Quarantine'])->count(),
        ];

        return view('vet.dashboard', compact('upcomingAppointments', 'recentRecords', 'stats'));
    }
}
