<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .form-container {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
        }
        
        .form-header {
            background: linear-gradient(to right, #3b82f6, #1d4ed8);
        }
        
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        
        .input-field {
            padding-left: 40px;
        }
        
        .btn-submit {
            background: linear-gradient(to right, #3b82f6, #1d4ed8);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .btn-submit:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .btn-submit:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        .success-card {
            animation: slideIn 0.5s ease-out;
        }
        
        .error-card {
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shake {
            0%, 100% {transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {transform: translateX(-5px);}
            20%, 40%, 60%, 80% {transform: translateX(5px);}
        }
        
        .floating-label {
            position: absolute;
            left: 40px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            transition: all 0.2s ease;
            pointer-events: none;
        }
        
        .input-field:focus + .floating-label,
        .input-field:not(:placeholder-shown) + .floating-label {
            top: 0;
            left: 10px;
            font-size: 0.75rem;
            padding: 0 4px;
            background-color: white;
            color: #3b82f6;
        }
        
        .role-option {
            transition: all 0.2s ease;
        }
        
        .role-option:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="max-w-2xl w-full form-container bg-white">
        <!-- Header -->
        <div class="form-header text-white p-6 text-center">
            <h1 class="text-3xl font-bold mb-2">
                <i class="fas fa-user-plus mr-2"></i>Create New Account
            </h1>
            <p class="text-blue-100">Register a new user to the system</p>
        </div>
        
        <div class="p-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="success-card mb-6 p-4 bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Success!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="error-card mb-6 p-4 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 text-red-700 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Please fix the following errors:</p>
                            <ul class="list-disc list-inside mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}" class="space-y-6">
                @csrf
                
                <!-- Name Field -->
                <div class="relative">
                    <i class="fas fa-user input-icon"></i>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        placeholder=" "
                        value="{{ old('name') }}" 
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-field transition duration-200"
                        required
                    >
                    <label for="name" class="floating-label">Full Name</label>
                </div>
                
                <!-- Email Field -->
                <div class="relative">
                    <i class="fas fa-envelope input-icon"></i>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        placeholder=" "
                        value="{{ old('email') }}" 
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-field transition duration-200"
                        required
                    >
                    <label for="email" class="floating-label">Email Address</label>
                </div>
                
                <!-- Password Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            placeholder=" "
                            class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-field transition duration-200"
                            required
                        >
                        <label for="password" class="floating-label">Password</label>
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation"
                            placeholder=" "
                            class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-field transition duration-200"
                            required
                        >
                        <label for="password_confirmation" class="floating-label">Confirm Password</label>
                    </div>
                </div>
                
                <!-- Role Selection -->
                <div class="relative">
                    <i class="fas fa-user-tag input-icon"></i>
                    <select 
                        name="role" 
                        id="role"
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none cursor-pointer transition duration-200"
                        required
                    >
                        <option value="" class="text-gray-400">Select Role</option>
                        <option value="vet" {{ old('role') == 'vet' ? 'selected' : '' }} class="role-option">Vet Collaborator</option>
                        <option value="rescue" {{ old('role') == 'rescue' ? 'selected' : '' }} class="role-option">Rescue Team</option>
                    </select>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
                
                <!-- NIC Field -->
                <div class="relative">
                    <i class="fas fa-id-card input-icon"></i>
                    <input 
                        type="text" 
                        name="nic" 
                        id="nic"
                        placeholder=" "
                        value="{{ old('nic') }}" 
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-field transition duration-200"
                    >
                    <label for="nic" class="floating-label">National ID Card (NIC)</label>
                </div>
                
                <!-- Phone Field -->
                <div class="relative">
                    <i class="fas fa-phone input-icon"></i>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone"
                        placeholder=" "
                        value="{{ old('phone') }}" 
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-field transition duration-200"
                    >
                    <label for="phone" class="floating-label">Phone Number</label>
                </div>
                
                <!-- Address Field -->
                <div class="relative">
                    <i class="fas fa-map-marker-alt input-icon" style="top: 20px;"></i>
                    <textarea 
                        name="address" 
                        id="address"
                        placeholder=" "
                        rows="3"
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    >{{ old('address') }}</textarea>
                    <label for="address" class="floating-label" style="top: 20px;">Address</label>
                </div>
                
                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full btn-submit text-white font-bold py-3 px-4 rounded-lg text-lg flex items-center justify-center"
                >
                    <i class="fas fa-user-plus mr-2"></i> Register User
                </button>
                
                <!-- Form Footer -->
                <div class="text-center text-gray-500 text-sm mt-4">
                    <p><i class="fas fa-shield-alt mr-1"></i> Your information is secure and protected</p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Add floating label functionality for all inputs
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.input-field, textarea, select');
            
            inputs.forEach(input => {
                // Initialize labels for pre-filled values
                if (input.value) {
                    const label = input.nextElementSibling;
                    if (label && label.classList.contains('floating-label')) {
                        label.style.top = '0';
                        label.style.left = '10px';
                        label.style.fontSize = '0.75rem';
                        label.style.padding = '0 4px';
                        label.style.backgroundColor = 'white';
                        label.style.color = '#3b82f6';
                    }
                }
                
                // Add focus/blur events for floating labels
                input.addEventListener('focus', function() {
                    const label = this.nextElementSibling;
                    if (label && label.classList.contains('floating-label')) {
                        label.style.top = '0';
                        label.style.left = '10px';
                        label.style.fontSize = '0.75rem';
                        label.style.padding = '0 4px';
                        label.style.backgroundColor = 'white';
                        label.style.color = '#3b82f6';
                    }
                });
                
                input.addEventListener('blur', function() {
                    const label = this.nextElementSibling;
                    if (label && label.classList.contains('floating-label')) {
                        if (!this.value) {
                            label.style.top = '50%';
                            label.style.left = '40px';
                            label.style.fontSize = 'inherit';
                            label.style.padding = '0';
                            label.style.backgroundColor = 'transparent';
                            label.style.color = '#6b7280';
                        }
                    }
                });
            });
            
            // Role selection styling
            const roleSelect = document.getElementById('role');
            if (roleSelect) {
                roleSelect.addEventListener('change', function() {
                    if (this.value) {
                        this.style.color = '#1f2937';
                    } else {
                        this.style.color = '#6b7280';
                    }
                });
                
                // Initialize color based on current value
                if (roleSelect.value) {
                    roleSelect.style.color = '#1f2937';
                }
            }
        });
    </script>
</body>
</html>