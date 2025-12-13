<!-- resources/views/admin_reports/create_report.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 500px; margin: auto; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
        .success { background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .error { background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Create Report</h1>

    <!-- Display success message -->
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.reports.store') }}" method="POST">
        @csrf

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5" required>{{ old('description') }}</textarea>

        <button type="submit">Create Report</button>
    </form>

</body>
</html>
