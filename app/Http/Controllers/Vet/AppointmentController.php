<?php

namespace App\Http\Controllers\Vet;

use App\Http\Controllers\Controller;
use App\Models\VetAppointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $vet = auth()->user()->veterinarian;
        
        if (!$vet) {
            $appointments = collect(); // Empty collection if no profile
             // Or better, paginate an empty query
             $appointments = VetAppointment::where('id', -1)->paginate(10);
        } else {
            $appointments = VetAppointment::with(['animal', 'veterinarian'])
                ->where('veterinarian_id', $vet->id)
                ->orderBy('appointment_date', 'desc')
                ->paginate(10);
        }

        return view('vet.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        $appointment = VetAppointment::with(['animal', 'veterinarian'])->findOrFail($id);
        return view('vet.appointments.show', compact('appointment'));
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = VetAppointment::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        $appointment->update($validated);

        return redirect()->route('vet.appointments.index')
            ->with('success', 'Appointment status updated.');
    }
}
