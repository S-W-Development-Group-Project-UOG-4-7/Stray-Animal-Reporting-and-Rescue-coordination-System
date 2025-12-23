<form action="{{ route('rescue.update', $rescue->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px; max-width: 400px;">
    @csrf
    @method('PUT')

    <div style="display: flex; flex-direction: column;">
        <label for="animal_type" style="margin-bottom: 5px; font-weight: bold;">Animal Type:</label>
        <input type="text" name="animal_type" id="animal_type" value="{{ $rescue->animal_type }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="display: flex; flex-direction: column;">
        <label for="condition" style="margin-bottom: 5px; font-weight: bold;">Condition:</label>
        <input type="text" name="condition" id="condition" value="{{ $rescue->condition }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="display: flex; flex-direction: column;">
        <label for="location" style="margin-bottom: 5px; font-weight: bold;">Location:</label>
        <input type="text" name="location" id="location" value="{{ $rescue->location }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="display: flex; flex-direction: column;">
        <label for="status" style="margin-bottom: 5px; font-weight: bold;">Status:</label>
        <input type="text" name="status" id="status" value="{{ $rescue->status }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="display: flex; flex-direction: column;">
        <label for="notes" style="margin-bottom: 5px; font-weight: bold;">Notes:</label>
        <textarea name="notes" id="notes" rows="4" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $rescue->notes }}</textarea>
    </div>

    <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; align-self: flex-start;">Update</button>
</form>