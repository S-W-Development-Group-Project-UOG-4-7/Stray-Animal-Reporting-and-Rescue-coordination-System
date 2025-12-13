<h2>Accept New Assignment</h2>

<form method="POST" action="{{ route('assignments.store') }}">
    @csrf
    <label>Animal Name:</label>
    <input type="text" name="animal_name" required>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <button type="submit">Accept Assignment</button>
</form>
