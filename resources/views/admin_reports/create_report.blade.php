<!DOCTYPE html>
<html>
<head>
    <title>Create Report</title>
</head>
<body>

<h1>Create Report</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.reports.store') }}">
    @csrf

    <label>Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description</label><br>
    <textarea name="description" required></textarea><br><br>

    <button type="submit">Submit Report</button>
</form>

</body>
</html>
