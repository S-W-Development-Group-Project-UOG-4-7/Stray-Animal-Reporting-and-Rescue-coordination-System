<h2>Stray Dog Reports</h2>

@if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

@foreach($reports as $report)
<div style="border:1px solid #ccc; padding:10px; margin:10px;">
    <strong>{{ $report->title }}</strong> <br>
    Location: {{ $report->location }} <br>
    Reported: {{ $report->created_at->diffForHumans() }} • {{ $report->dogs_count }} dogs <br>
    Status: {{ $report->status }} <br>
    
    @if($report->status == 'pending')
        <a href="{{ route('rescue.reports.accept', $report->id) }}">Accept Assignment</a> |
    @endif
    <a href="{{ route('rescue.reports.show', $report->id) }}">View Details</a>
</div>
@endforeach
