<form action="{{ route('rescue.update', $rescue->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="animal_type" value="{{ $rescue->animal_type }}">
    <input type="text" name="condition" value="{{ $rescue->condition }}">
    <input type="text" name="location" value="{{ $rescue->location }}">
    <input type="text" name="status" value="{{ $rescue->status }}">
    <textarea name="notes">{{ $rescue->notes }}</textarea>

    <button type="submit">Update</button>
</form>
