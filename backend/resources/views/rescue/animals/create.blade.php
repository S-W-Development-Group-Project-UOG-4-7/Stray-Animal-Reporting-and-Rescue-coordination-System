<!-- resources/views/rescue/animals/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Animal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">Add New Animal</h1>

    <form action="{{ route('rescue.animals.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Animal Name"
               class="w-full mb-3 p-2 rounded" required>

        <input type="text" name="species" placeholder="Species"
               class="w-full mb-3 p-2 rounded" required>

        <input type="text" name="breed" placeholder="Breed"
               class="w-full mb-3 p-2 rounded">

        <input type="number" name="age" placeholder="Age"
               class="w-full mb-3 p-2 rounded" required>

        <select name="status" class="w-full mb-3 p-2 rounded" required>
            <option value="">Select Status</option>
            <option value="Available">Available</option>
            <option value="Adopted">Adopted</option>
            <option value="Rescued">Rescued</option>
        </select>

        <button type="submit" class="bg-green-600 px-4 py-2 rounded text-white">Save Animal</button>
    </form>

</body>
</html>
