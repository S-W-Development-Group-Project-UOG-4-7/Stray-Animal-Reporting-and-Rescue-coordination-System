<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AnimalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::orderBy('created_at', 'desc')->paginate(8);

        $stats = [
            'total' => Animal::count(),
            'available' => Animal::where('status', 'Available')->count(),
            'medical' => Animal::where('status', 'In Treatment')->count(),
            'quarantine' => Animal::where('status', 'Quarantine')->count(),
        ];

        return view('rescue.animals', compact('animals', 'stats'));
    }

    public function create()
    {
        return view('rescue.animals.create');
    }

    public function createFromReport($reportId)
    {
        $report = AnimalReport::findOrFail($reportId);
        return view('rescue.animals.create_from_report', compact('report'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'animal_report_id' => 'nullable|exists:animal_reports,id',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/animals', $imageName);
            $data['image'] = 'animals/' . $imageName;
        }

        // If creating from a report, use the report's image if no new image is uploaded
        if (!$request->hasFile('image') && $request->filled('animal_report_id')) {
            $report = AnimalReport::find($request->animal_report_id);
            if ($report && $report->animal_photo) {
                // Determine if the photo is stored as 'storage/...' or just path
                // The report controller stores as 'storage/animal-photos/...'
                // Animal controller expects 'animals/...' or full path?
                // Let's copy the file to the animals directory to keep things organized or just reference it.
                // Simpler to just reference it, but Animal model accessor might expect specific path.
                // Looking at AnimalController@store, it saves 'animals/filename'.
                // AnimalReport saves 'storage/animal-photos/filename'.
                // Let's just save the path as is, assuming the view handles 'storage/' prefix or the accessor does.
                // Actually, let's just copy the path.
                $data['image'] = str_replace('storage/', '', $report->animal_photo);
            }
        }

        $animal = Animal::create($data);

        if ($request->filled('animal_report_id')) {
            $report = AnimalReport::find($request->animal_report_id);
            if ($report) {
                $report->update(['status' => 'rescued']); // Or 'completed'? 'rescued' seems appropriate.
            }
        }

        return redirect()
            ->route('rescue.animals')
            ->with('success', 'Animal added successfully');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('rescue.animals.show', compact('animal'));
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('rescue.animals.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($animal->image && Storage::exists('public/' . $animal->image)) {
                Storage::delete('public/' . $animal->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/animals', $imageName);
            $data['image'] = 'animals/' . $imageName;
        }

        $animal->update($data);

        return redirect()
            ->route('rescue.animals')
            ->with('success', 'Animal updated successfully');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()
            ->route('rescue.animals')
            ->with('success', 'Animal deleted successfully');
    }
}
