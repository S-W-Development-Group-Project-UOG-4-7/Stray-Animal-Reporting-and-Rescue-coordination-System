    {{-- resources/views/veterinarians/create.blade.php --}}

<form action="{{ route('veterinarians.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Vet Name" required>
    <input type="text" name="clinic" placeholder="Clinic Name" required>
    <input type="text" name="phone" placeholder="Phone Number" required>

    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>

    <button type="submit">Save Vet</button>
</form>
