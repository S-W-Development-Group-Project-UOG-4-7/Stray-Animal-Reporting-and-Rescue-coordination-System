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

        <div class="mb-4">
            <label class="block mb-1">Animal Type</label>
            <select name="animal_type" class="w-full p-2 bg-gray-800 rounded">
                @foreach(['Aggressive','Sick/Injured','Stray/Lost','Abandoned'] as $type)
                    <option value="{{ $type }}" {{ $report->animal_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Location</label>
            <input type="text" name="location" value="{{ $report->location }}" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Last Seen</label>
            <input type="datetime-local" name="last_seen" 
                value="{{ \Carbon\Carbon::parse($report->last_seen)->format('Y-m-d\TH:i') }}"
                class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full p-2 bg-gray-800 rounded">{{ $report->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contact Name</label>
            <input type="text" name="contact_name" value="{{ $report->contact_name }}" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contact Email</label>
            <input type="email" name="contact_email" value="{{ $report->contact_email }}" class="w-full p-2 bg-gray-800 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Animal Photo (optional)</label>
            <input type="file" name="animal_photo" class="w-full p-2 bg-gray-800 rounded">
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
document.getElementById('edit-report-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const errorDiv = document.getElementById('edit-error');
    const successDiv = document.getElementById('edit-success');

    errorDiv.textContent = '';
    successDiv.textContent = '';

    fetch(`/report/{{ $report->report_id }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            successDiv.textContent = "Report updated successfully!";
            window.location.href = `/track-report/{{ $report->report_id }}`;
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