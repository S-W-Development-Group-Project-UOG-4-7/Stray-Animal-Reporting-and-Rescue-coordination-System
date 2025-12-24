<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Reports</h2>

<a href="{{ route('admin.reports.create') }}" class="btn btn-primary mb-3">
    Create Report
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ ucfirst($report->status) }}</td>
                <td>{{ $report->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No reports found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
