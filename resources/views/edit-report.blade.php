<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Report - SafePaws</title>
<script src="https://cdn.tailwindcss.com"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="min-h-screen p-6 text-white bg-gray-900">

<div class="max-w-3xl mx-auto">
    <a href="{{ route('track.report', $report->report_id) }}" class="inline-block mb-6 text-cyan-400 hover:text-cyan-300">
        &larr; Back to Report
    </a>

    <h1 class="mb-6 text-3xl font-bold">Edit Report: {{ $report->report_id }}</h1>

    <form id="edit-report-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Animal Type Field -->
        <div class="mb-4">
            <label class="block mb-1">Animal Type <span class="text-red-500">*</span></label>
            <select name="animal_type" class="w-full p-2 bg-gray-800 rounded" required>
                <option value="">Select Type</option>
                @foreach(['Aggressive','Sick/Injured','Stray/Lost','Abandoned'] as $type)
                    <option value="{{ $type }}" {{ $report->animal_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <!-- Animal Species Field -->
        <div class="mb-4">
            <label class="block mb-1">Animal Species <span class="text-red-500">*</span></label>
            <select name="animal_species" id="animal_species" required class="w-full p-2 bg-gray-800 rounded" onchange="toggleOtherSpeciesField()">
                <option value="">Select Species</option>
                @foreach(['Dog', 'Cat', 'Bird', 'Other'] as $species)
                    <option value="{{ $species }}" {{ $report->animal_species == $species ? 'selected' : '' }}>{{ $species }}</option>
                @endforeach
            </select>
        </div>

        <!-- Other Species Field (Conditional) -->
        <div class="hidden mb-4" id="other_species_container">
            <label class="block mb-1">Specify Animal Species <span class="text-red-500">*</span></label>
            <input type="text" name="other_species" id="other_species" 
                   value="{{ $report->animal_species == 'Other' ? $report->other_species : '' }}"
                   placeholder="e.g., Rabbit, Squirrel, Fox, etc."
                   class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Location <span class="text-red-500">*</span></label>
            <input type="text" name="location" value="{{ $report->location }}" class="w-full p-2 bg-gray-800 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Last Seen <span class="text-red-500">*</span></label>
            <input type="datetime-local" name="last_seen" 
                value="{{ \Carbon\Carbon::parse($report->last_seen)->format('Y-m-d\TH:i') }}"
                class="w-full p-2 bg-gray-800 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description <span class="text-red-500">*</span></label>
            <textarea name="description" class="w-full p-2 bg-gray-800 rounded" required>{{ $report->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contact Name <span class="text-red-500">*</span></label>
            <input type="text" name="contact_name" value="{{ $report->contact_name }}" class="w-full p-2 bg-gray-800 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contact Email <span class="text-red-500">*</span></label>
            <input type="email" name="contact_email" value="{{ $report->contact_email }}" class="w-full p-2 bg-gray-800 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Animal Photo (optional)</label>
            <input type="file" name="animal_photo" accept="image/*" class="w-full p-2 bg-gray-800 rounded">
            @if($report->animal_photo)
                <img src="{{ asset($report->animal_photo) }}" class="mt-2 rounded max-h-48">
            @endif
        </div>

        <button type="submit" class="px-6 py-2 rounded bg-cyan-500 hover:bg-cyan-600">Update Report</button>
        <div id="edit-error" class="mt-2 text-red-500"></div>
        <div id="edit-success" class="mt-2 text-green-500"></div>
    </form>
</div>

<script>
// Function to toggle the "other_species" field visibility
function toggleOtherSpeciesField() {
    const speciesSelect = document.getElementById('animal_species');
    const otherSpeciesContainer = document.getElementById('other_species_container');
    const otherSpeciesInput = document.getElementById('other_species');
    
    if (speciesSelect.value === 'Other') {
        otherSpeciesContainer.classList.remove('hidden');
        otherSpeciesInput.required = true;
    } else {
        otherSpeciesContainer.classList.add('hidden');
        otherSpeciesInput.required = false;
        otherSpeciesInput.value = ''; // Clear the value when hidden
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleOtherSpeciesField();
});

document.getElementById('edit-report-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    
    // Add the _method field for Laravel to recognize it as PUT
    formData.append('_method', 'PUT');
    
    const errorDiv = document.getElementById('edit-error');
    const successDiv = document.getElementById('edit-success');

    errorDiv.textContent = '';
    successDiv.textContent = '';

    // Client-side validation for other_species
    const speciesSelect = document.getElementById('animal_species');
    const otherSpeciesInput = document.getElementById('other_species');
    
    if (speciesSelect.value === 'Other' && !otherSpeciesInput.value.trim()) {
        errorDiv.textContent = "Please specify the animal species when selecting 'Other'.";
        return;
    }

    // If species is not "Other", remove the other_species field from form data
    if (speciesSelect.value !== 'Other') {
        formData.delete('other_species');
    }

    fetch(`/report/{{ $report->report_id }}`, {
        method: 'POST', // Laravel expects POST with _method=PUT
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json' // Expect JSON response
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            successDiv.textContent = "Report updated successfully!";
            // Redirect after a short delay
            setTimeout(() => {
                window.location.href = `/track-report/{{ $report->report_id }}`;
            }, 1500);
        } else if(data.errors){
            errorDiv.textContent = Object.values(data.errors).flat().join(' | ');
        } else {
            errorDiv.textContent = data.message || "Update failed.";
        }
    })
    .catch(() => {
        errorDiv.textContent = "Server error. Try again.";
    });
});
</script>

</body>
</html>