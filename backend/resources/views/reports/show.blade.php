<h2>Report Details</h2>

<p><strong>Animal Type:</strong> {{ $report->animal_type }}</p>
<p><strong>Location:</strong> {{ $report->location }}</p>
<p><strong>Description:</strong> {{ $report->description }}</p>
<p><strong>Status:</strong> {{ $report->status }}</p>

<a href="{{ url()->previous() }}">⬅ Back</a>
