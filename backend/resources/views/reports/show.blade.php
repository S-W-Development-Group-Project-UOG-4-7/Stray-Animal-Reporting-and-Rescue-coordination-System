<h2>{{ $report->title }}</h2>
<p><strong>Location:</strong> {{ $report->location }}</p>
<p><strong>Description:</strong> {{ $report->description }}</p>
<p><strong>Number of Dogs:</strong> {{ $report->dogs_count }}</p>
<p><strong>Status:</strong> {{ $report->status }}</p>

<a href="{{ route('reports.index') }}">Back to Reports</a>
