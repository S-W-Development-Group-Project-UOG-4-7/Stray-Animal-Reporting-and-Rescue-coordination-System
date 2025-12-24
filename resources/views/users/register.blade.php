<div class="max-w-xl bg-white p-6 rounded shadow mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Register User</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="w-full mb-3 p-2 border" required>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full mb-3 p-2 border" required>
        <input type="password" name="password" placeholder="Password" class="w-full mb-3 p-2 border" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full mb-3 p-2 border" required>

        <select name="role" class="w-full mb-3 p-2 border" required>
            <option value="">Select Role</option>
            <option value="vet" {{ old('role') == 'vet' ? 'selected' : '' }}>Vet Collaborator</option>
            <option value="rescue" {{ old('role') == 'rescue' ? 'selected' : '' }}>Rescue Team</option>
        </select>

        <input type="text" name="nic" placeholder="NIC" value="{{ old('nic') }}" class="w-full mb-3 p-2 border">
        <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" class="w-full mb-3 p-2 border">
        <textarea name="address" placeholder="Address" class="w-full mb-3 p-2 border">{{ old('address') }}</textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Register
        </button>
    </form>
</div>
