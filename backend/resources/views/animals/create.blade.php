<form action="{{ route('rescue.animals.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Animal Name" class="w-full mb-3 p-2 rounded" required>
    <input type="text" name="species" placeholder="Species" class="w-full mb-3 p-2 rounded" required>
    <input type="text" name="breed" placeholder="Breed" class="w-full mb-3 p-2 rounded">
    <!-- add other fields -->
    <button type="submit" class="bg-green-600 px-4 py-2 rounded text-white">Save Animal</button>
</form>
