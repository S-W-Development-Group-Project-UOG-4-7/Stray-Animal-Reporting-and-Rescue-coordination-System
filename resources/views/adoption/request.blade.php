@extends('layouts.app')

@section('title', 'Adoption Request — SafePaws')

@push('styles')
<style type="text/tailwindcss">
    @keyframes slide-in {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes pulse-glow {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    .animate-slide-in {
        animation: slide-in 0.6s ease-out;
    }

    .animate-pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    .form-group {
        @apply mb-6;
    }

    .form-label {
        @apply block mb-2 text-lg font-medium;
    }

    .form-input {
        @apply w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30;
    }

    .form-textarea {
        @apply w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30;
        min-height: 120px;
    }

    .form-select {
        @apply w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30;
    }

    .form-checkbox {
        @apply w-5 h-5 mr-3 rounded-sm bg-white/10 border-white/20 focus:ring-cyan-500 focus:ring-2;
    }

    .form-radio {
        @apply w-5 h-5 mr-3 bg-white/10 border-white/20 focus:ring-cyan-500 focus:ring-2;
    }

    .error-message {
        @apply hidden mt-2 text-sm text-red-400;
    }

    .success-checkmark {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        background: linear-gradient(135deg, #0ea5e9, #22d3ee);
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse-glow 2s infinite;
    }

    .success-checkmark::after {
        content: '✓';
        color: white;
        font-size: 40px;
        font-weight: bold;
    }

    .required-field::after {
        content: ' *';
        color: #f87171;
    }

    .step-indicator {
        @apply w-10 h-10 rounded-full flex items-center justify-center text-white font-bold transition-all duration-300 border-2 border-white/20;
    }

    .step-indicator.active {
        @apply gradient-bg shadow-lg shadow-cyan-500/30 border-cyan-500;
    }

    .step-indicator.completed {
        @apply bg-green-500 border-green-500;
    }

    .progress-bar {
        height: 4px;
        background: linear-gradient(90deg, #0ea5e9, #22d3ee);
        border-radius: 2px;
        transition: width 0.5s ease;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
        <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
        <div class="px-5 container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="mb-6 title">
                    Adopt a <span class="gradient-text">Forever Friend</span>
                </h1>
                <p class="mb-10 subtitle">
                    Fill out our adoption request form to start the journey of welcoming a new family member into your home.
                </p>
                
                <div class="inline-flex items-center gap-4 px-6 py-3 mb-10 rounded-full bg-cyan-500/20">
                    <i class="text-cyan-400 fas fa-info-circle"></i>
                    <p class="text-sm">Your application will be reviewed within 3-5 business days</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Multi-step Form -->
    <section class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <!-- Form Steps Indicator -->
                <div class="mb-12">
                    <div class="relative flex items-center justify-between">
                        <div class="absolute left-0 right-0 h-1 -translate-y-1/2 top-1/2 bg-white/10 -z-10"></div>
                        <div id="form-progress" class="absolute left-0 -translate-y-1/2 progress-bar top-1/2 -z-10" style="width: 33%"></div>
                        
                        <div class="z-10 flex flex-col items-center">
                            <div class="step-indicator active">1</div>
                            <span class="mt-2 text-sm">Personal Info</span>
                        </div>
                        <div class="z-10 flex flex-col items-center">
                            <div class="step-indicator">2</div>
                            <span class="mt-2 text-sm text-gray-400">Animal Details</span>
                        </div>
                        <div class="z-10 flex flex-col items-center">
                            <div class="step-indicator">3</div>
                            <span class="mt-2 text-sm text-gray-400">Review & Submit</span>
                        </div>
                    </div>
                </div>

                <!-- Adoption Form -->
                <form id="adoption-form" action="{{ route('adoption.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Step 1: Personal Information -->
                    <div id="step-1" class="form-step card animate-slide-in">
                        <h3 class="mb-6 text-2xl font-bold gradient-text">1. Your Personal Information</h3>
                        
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="form-group">
                                <label for="first_name" class="form-label required-field">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-input" 
                                       value="{{ old('first_name') }}" required>
                                <div id="first-name-error" class="error-message">Please enter your first name</div>
                                @error('first_name')
                                    <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="last_name" class="form-label required-field">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-input" 
                                       value="{{ old('last_name') }}" required>
                                <div id="last-name-error" class="error-message">Please enter your last name</div>
                                @error('last_name')
                                    <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label required-field">Email Address</label>
                            <input type="email" id="email" name="email" class="form-input" 
                                   value="{{ old('email') }}" required>
                            <div id="email-error" class="error-message">Please enter a valid email address</div>
                            @error('email')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="form-group">
                                <label for="phone" class="form-label required-field">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input" 
                                       value="{{ old('phone') }}" required>
                                <div id="phone-error" class="error-message">Please enter a valid phone number</div>
                                @error('phone')
                                    <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="dob" class="form-label required-field">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-input" 
                                       value="{{ old('dob') }}" required>
                                <div id="dob-error" class="error-message">Please enter your date of birth</div>
                                @error('dob')
                                    <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="form-label required-field">Full Address</label>
                            <textarea id="address" name="address" rows="3" class="form-textarea" required>{{ old('address') }}</textarea>
                            <div id="address-error" class="error-message">Please enter your full address</div>
                            @error('address')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required-field">Housing Type</label>
                            <div class="grid gap-4 md:grid-cols-3">
                                <label class="flex items-center p-4 transition-all duration-300 border rounded-xl cursor-pointer bg-white/5 border-white/20 hover:border-cyan-500">
                                    <input type="radio" name="housing_type" value="own" class="form-radio" 
                                           {{ old('housing_type') == 'own' ? 'checked' : '' }} required>
                                    <span class="ml-3">Own</span>
                                </label>
                                <label class="flex items-center p-4 transition-all duration-300 border rounded-xl cursor-pointer bg-white/5 border-white/20 hover:border-cyan-500">
                                    <input type="radio" name="housing_type" value="rent" class="form-radio" 
                                           {{ old('housing_type') == 'rent' ? 'checked' : '' }} required>
                                    <span class="ml-3">Rent</span>
                                </label>
                                <label class="flex items-center p-4 transition-all duration-300 border rounded-xl cursor-pointer bg-white/5 border-white/20 hover:border-cyan-500">
                                    <input type="radio" name="housing_type" value="other" class="form-radio" 
                                           {{ old('housing_type') == 'other' ? 'checked' : '' }} required>
                                    <span class="ml-3">Other</span>
                                </label>
                            </div>
                            <div id="housing-error" class="error-message">Please select your housing type</div>
                            @error('housing_type')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" class="primary-btn next-step" data-next="2">
                                Next Step
                                <i class="ml-2 fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Animal Details & Adoption Reason -->
                    <div id="step-2" class="hidden form-step card">
                        <h3 class="mb-6 text-2xl font-bold gradient-text">2. Animal Details & Adoption Reason</h3>
                        
                        <div class="form-group">
                            <label for="animal_id" class="form-label required-field">Which animal are you interested in?</label>
                            <select id="animal_id" name="animal_id" class="form-select" required>
                                <option value="">Select an animal</option>
                                <option value="max" {{ old('animal_id') == 'max' ? 'selected' : '' }}>Max - Golden Retriever (4 months)</option>
                                <option value="luna" {{ old('animal_id') == 'luna' ? 'selected' : '' }}>Luna - Calico Cat (3 years)</option>
                                <option value="buddy" {{ old('animal_id') == 'buddy' ? 'selected' : '' }}>Buddy - Labrador (10 years)</option>
                                <option value="mittens" {{ old('animal_id') == 'mittens' ? 'selected' : '' }}>Mittens - Siamese Cat (2 years)</option>
                                <option value="cotton" {{ old('animal_id') == 'cotton' ? 'selected' : '' }}>Cotton - Rabbit (1 year)</option>
                                <option value="hope" {{ old('animal_id') == 'hope' ? 'selected' : '' }}>Hope - Mixed Breed (6 months)</option>
                                <option value="other" {{ old('animal_id') == 'other' ? 'selected' : '' }}>Not Sure / Haven't Decided</option>
                            </select>
                            <div id="animal-error" class="error-message">Please select an animal</div>
                            @error('animal_id')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required-field">Have you owned a pet before?</label>
                            <div class="flex gap-6">
                                <label class="flex items-center">
                                    <input type="radio" name="previous_pet" value="yes" class="form-radio" 
                                           {{ old('previous_pet') == 'yes' ? 'checked' : '' }} required>
                                    <span class="ml-2">Yes</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="previous_pet" value="no" class="form-radio" 
                                           {{ old('previous_pet') == 'no' ? 'checked' : '' }} required>
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                            <div id="previous-pet-error" class="error-message">Please select an option</div>
                            @error('previous_pet')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="current_pets" class="form-label">Current Pets (if any)</label>
                            <textarea id="current_pets" name="current_pets" rows="3" class="form-textarea" 
                                      placeholder="Tell us about any pets you currently have, including type, age, and if they are spayed/neutered...">{{ old('current_pets') }}</textarea>
                            @error('current_pets')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="adoption_reason" class="form-label required-field">Why do you want to adopt this animal?</label>
                            <textarea id="adoption_reason" name="adoption_reason" rows="4" class="form-textarea" required 
                                      placeholder="Please tell us about your lifestyle, why you're interested in adoption, and what you can offer to this animal...">{{ old('adoption_reason') }}</textarea>
                            <div id="reason-error" class="error-message">Please tell us why you want to adopt</div>
                            @error('adoption_reason')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="home_environment" class="form-label required-field">Describe your home environment</label>
                            <textarea id="home_environment" name="home_environment" rows="3" class="form-textarea" required 
                                      placeholder="Who lives in your home? Do you have children? What is your daily schedule like?">{{ old('home_environment') }}</textarea>
                            <div id="environment-error" class="error-message">Please describe your home environment</div>
                            @error('home_environment')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="vet_info" class="form-label">Veterinarian Information (Optional)</label>
                            <textarea id="vet_info" name="vet_info" rows="2" class="form-textarea" 
                                      placeholder="Vet name, clinic, and contact information">{{ old('vet_info') }}</textarea>
                            @error('vet_info')
                                <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="button" class="secondary-btn prev-step" data-prev="1">
                                <i class="mr-2 fas fa-arrow-left"></i>
                                Previous
                            </button>
                            <button type="button" class="primary-btn next-step" data-next="3">
                                Next Step
                                <i class="ml-2 fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Review & Submit -->
                    <div id="step-3" class="hidden form-step card">
                        <h3 class="mb-6 text-2xl font-bold gradient-text">3. Review & Submit Your Application</h3>
                        
                        <!-- Review Summary -->
                        <div class="mb-8">
                            <div class="mb-6 card bg-white/5">
                                <h4 class="mb-4 text-xl font-bold">Application Summary</h4>
                                <div class="space-y-4">
                                    <div class="grid gap-4 md:grid-cols-2">
                                        <div>
                                            <p class="text-gray-400">Full Name</p>
                                            <p id="review-name" class="font-bold">-</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-400">Contact Info</p>
                                            <p id="review-contact" class="font-bold">-</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Address</p>
                                        <p id="review-address" class="font-bold">-</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Animal Interest</p>
                                        <p id="review-animal" class="font-bold">-</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Adoption Reason</p>
                                        <p id="review-reason" class="font-bold">-</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Terms and Conditions -->
                            <div class="mb-6">
                                <div class="flex items-start">
                                    <input type="checkbox" id="terms" name="terms" class="form-checkbox mt-1" 
                                           {{ old('terms') ? 'checked' : '' }} required>
                                    <label for="terms" class="text-sm text-gray-300">
                                        I certify that the information provided is true and accurate. I understand that providing false information may result in disqualification from the adoption process. I agree to a home visit if required and understand that SafePaws reserves the right to deny any application. I agree to the <a href="{{ route('terms') }}" class="text-cyan-400 hover:underline">Adoption Terms</a> and <a href="{{ route('privacy') }}" class="text-cyan-400 hover:underline">Privacy Policy</a>.
                                    </label>
                                </div>
                                <div id="terms-error" class="error-message">
                                    You must agree to the terms and conditions
                                </div>
                                @error('terms')
                                    <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Optional Newsletter -->
                            <div class="flex items-start">
                                <input type="checkbox" id="newsletter" name="newsletter" class="form-checkbox mt-1"
                                       {{ old('newsletter') ? 'checked' : '' }}>
                                <label for="newsletter" class="text-sm text-gray-300">
                                    Yes, I would like to receive updates about adoption events, success stories, and other SafePaws news via email.
                                </label>
                                @error('newsletter')
                                    <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="button" class="secondary-btn prev-step" data-prev="2">
                                <i class="mr-2 fas fa-arrow-left"></i>
                                Previous
                            </button>
                            <button type="submit" class="primary-btn">
                                <i class="mr-2 fas fa-paper-plane"></i>
                                Submit Application
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Success Message (for AJAX submissions) -->
                <div id="success-message" class="hidden text-center card animate-slide-in">
                    <div class="mb-6 success-checkmark"></div>
                    <h3 class="mb-4 text-2xl font-bold">Application Submitted Successfully!</h3>
                    <p class="mb-6 text-gray-300">
                        Thank you for your interest in adopting from SafePaws. Our adoption team will review your application and contact you within 3-5 business days.
                    </p>
                    <div class="max-w-md mx-auto mb-6 card bg-white/5">
                        <p class="mb-2 text-gray-400">Your Application ID:</p>
                        <p id="application-id" class="text-2xl font-bold gradient-text">ADOPT-{{ date('Y') }}-XXXXX</p>
                        <p class="mt-3 text-sm text-gray-300">
                            <i class="mr-1 fas fa-info-circle"></i>
                            Keep this ID for future reference
                        </p>
                    </div>
                    <p class="mb-8 text-gray-300">
                        <i class="mr-2 fas fa-envelope text-cyan-400"></i>
                        A confirmation email has been sent to <span id="confirm-email" class="font-bold"></span>
                    </p>
                    <div class="flex flex-col justify-center gap-4 sm:flex-row">
                        <a href="{{ route('adoption.list') }}" class="primary-btn">
                            <i class="mr-2 fas fa-paw"></i>
                            Browse More Animals
                        </a>
                        <a href="{{ route('home') }}" class="secondary-btn">
                            <i class="mr-2 fas fa-home"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="section-padding">
        <div class="container-custom">
            <div class="mb-16 text-center">
                <h2 class="section-title">Adoption FAQs</h2>
                <p class="section-subtitle">
                    Common questions about our adoption process
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    <div class="card">
                        <h3 class="mb-3 text-xl font-bold">How long does the adoption process take?</h3>
                        <p class="text-gray-300">The entire process typically takes 1-2 weeks from application to adoption. This includes application review, interviews, and home visits if required.</p>
                    </div>
                    
                    <div class="card">
                        <h3 class="mb-3 text-xl font-bold">What are the adoption fees?</h3>
                        <p class="text-gray-300">Adoption fees range from $50-$300 depending on the animal's age and medical needs. All fees include spay/neuter, vaccinations, microchip, and a health check.</p>
                    </div>
                    
                    <div class="card">
                        <h3 class="mb-3 text-xl font-bold">Can I return an animal if it doesn't work out?</h3>
                        <p class="text-gray-300">Yes, SafePaws has a lifetime return policy. If for any reason you cannot keep your adopted pet, we will take them back and find them a new home.</p>
                    </div>
                    
                    <div class="card">
                        <h3 class="mb-3 text-xl font-bold">What if I'm not sure which animal to adopt?</h3>
                        <p class="text-gray-300">Our adoption counselors can help match you with the perfect pet based on your lifestyle, experience, and preferences. Just indicate "Not Sure" in your application.</p>
                    </div>
                </div>
                
                <div class="mt-12 text-center">
                    <p class="mb-6 text-gray-300">Have more questions?</p>
                    <a href="{{ route('contact') }}" class="primary-btn">
                        <i class="mr-2 fas fa-question-circle"></i>
                        Contact Our Team
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Form handling
    let currentStep = 1;
    const totalSteps = 3;
    const formProgress = document.getElementById('form-progress');
    const steps = document.querySelectorAll('.step-indicator');
    
    // Check if there are validation errors and show appropriate step
    @if($errors->any())
        // If there are errors, show the appropriate step
        @if(old('first_name') || old('last_name') || $errors->has('first_name') || $errors->has('last_name'))
            showStep(1);
        @elseif(old('animal_id') || $errors->has('animal_id') || $errors->has('adoption_reason'))
            showStep(2);
        @elseif(old('terms') || $errors->has('terms'))
            showStep(3);
        @endif
    @endif
    
    // Update progress bar and step indicators
    function updateProgress() {
        // Update progress bar width
        const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
        formProgress.style.width = `${progressPercentage}%`;
        
        // Update step indicators
        steps.forEach((step, index) => {
            const stepNumber = index + 1;
            if (stepNumber < currentStep) {
                step.classList.remove('active');
                step.classList.add('completed');
                step.innerHTML = '<i class="fas fa-check"></i>';
            } else if (stepNumber === currentStep) {
                step.classList.add('active');
                step.classList.remove('completed');
                step.textContent = stepNumber;
            } else {
                step.classList.remove('active', 'completed');
                step.textContent = stepNumber;
            }
        });
    }
    
    // Show specific step
    function showStep(stepNumber) {
        // Hide all steps
        document.querySelectorAll('.form-step').forEach(step => {
            step.classList.add('hidden');
        });
        
        // Show requested step
        const stepToShow = document.getElementById(`step-${stepNumber}`);
        if (stepToShow) {
            stepToShow.classList.remove('hidden');
            currentStep = stepNumber;
            updateProgress();
            
            // If on review step, populate review
            if (stepNumber === 3) {
                populateReview();
            }
            
            // Scroll to top of step
            setTimeout(() => {
                stepToShow.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }
    }
    
    // Validate current step
    function validateStep(stepNumber) {
        let isValid = true;
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(msg => msg.classList.add('hidden'));
        
        if (stepNumber === 1) {
            // Validate personal information
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const dob = document.getElementById('dob').value;
            const address = document.getElementById('address').value.trim();
            const housingType = document.querySelector('input[name="housing_type"]:checked');
            
            if (!firstName) {
                document.getElementById('first-name-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!lastName) {
                document.getElementById('last-name-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!email || !isValidEmail(email)) {
                document.getElementById('email-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!phone || !isValidPhone(phone)) {
                document.getElementById('phone-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!dob) {
                document.getElementById('dob-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!address) {
                document.getElementById('address-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!housingType) {
                document.getElementById('housing-error').classList.remove('hidden');
                isValid = false;
            }
        }
        
        if (stepNumber === 2) {
            // Validate animal details
            const animalId = document.getElementById('animal_id').value;
            const previousPet = document.querySelector('input[name="previous_pet"]:checked');
            const adoptionReason = document.getElementById('adoption_reason').value.trim();
            const homeEnvironment = document.getElementById('home_environment').value.trim();
            
            if (!animalId) {
                document.getElementById('animal-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!previousPet) {
                document.getElementById('previous-pet-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!adoptionReason) {
                document.getElementById('reason-error').classList.remove('hidden');
                isValid = false;
            }
            
            if (!homeEnvironment) {
                document.getElementById('environment-error').classList.remove('hidden');
                isValid = false;
            }
        }
        
        if (stepNumber === 3) {
            // Validate terms acceptance
            const termsAccepted = document.getElementById('terms').checked;
            if (!termsAccepted) {
                document.getElementById('terms-error').classList.remove('hidden');
                isValid = false;
            }
        }
        
        return isValid;
    }
    
    // Email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Phone validation (basic)
    function isValidPhone(phone) {
        const phoneRegex = /^[\d\s\-\(\)\+]{10,}$/;
        return phoneRegex.test(phone.replace(/\D/g, '').length >= 10);
    }
    
    // Populate review step
    function populateReview() {
        // Personal info
        const firstName = document.getElementById('first_name').value;
        const lastName = document.getElementById('last_name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;
        
        document.getElementById('review-name').textContent = `${firstName} ${lastName}`;
        document.getElementById('review-contact').textContent = `${email} | ${phone}`;
        document.getElementById('review-address').textContent = address;
        
        // Animal info
        const animalSelect = document.getElementById('animal_id');
        const selectedAnimal = animalSelect.options[animalSelect.selectedIndex].text;
        document.getElementById('review-animal').textContent = selectedAnimal;
        
        // Adoption reason (truncated if too long)
        const adoptionReason = document.getElementById('adoption_reason').value;
        const truncatedReason = adoptionReason.length > 100 ? adoptionReason.substring(0, 100) + '...' : adoptionReason;
        document.getElementById('review-reason').textContent = truncatedReason;
        
        // Store email for confirmation
        document.getElementById('confirm-email').textContent = email;
    }
    
    // Next step button handlers
    document.querySelectorAll('.next-step').forEach(button => {
        button.addEventListener('click', function() {
            const nextStep = parseInt(this.getAttribute('data-next'));
            if (validateStep(currentStep)) {
                showStep(nextStep);
            } else {
                // Scroll to first error
                const firstError = document.querySelector('.error-message:not(.hidden)');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
    });
    
    // Previous step button handlers
    document.querySelectorAll('.prev-step').forEach(button => {
        button.addEventListener('click', function() {
            const prevStep = parseInt(this.getAttribute('data-prev'));
            showStep(prevStep);
        });
    });
    
    // Real-time validation for email and phone
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            if (this.value && !isValidEmail(this.value)) {
                document.getElementById('email-error').classList.remove('hidden');
            }
        });
        
        emailInput.addEventListener('input', function() {
            if (isValidEmail(this.value)) {
                document.getElementById('email-error').classList.add('hidden');
            }
        });
    }
    
    if (phoneInput) {
        phoneInput.addEventListener('blur', function() {
            if (this.value && !isValidPhone(this.value)) {
                document.getElementById('phone-error').classList.remove('hidden');
            }
        });
        
        phoneInput.addEventListener('input', function() {
            if (isValidPhone(this.value)) {
                document.getElementById('phone-error').classList.add('hidden');
            }
        });
    }
    
    // AJAX form submission (optional enhancement)
    const adoptionForm = document.getElementById('adoption-form');
    const successMessage = document.getElementById('success-message');
    
    if (adoptionForm && !adoptionForm.hasAttribute('data-no-ajax')) {
        adoptionForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate all steps before AJAX submission
            let allValid = true;
            for (let i = 1; i <= 3; i++) {
                if (!validateStep(i)) {
                    allValid = false;
                    showStep(i);
                    break;
                }
            }
            
            if (!allValid) {
                return;
            }
            
            // Collect form data
            const formData = new FormData(this);
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Submitting...';
            submitBtn.disabled = true;
            
            // Send AJAX request
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Generate application ID
                    const applicationId = 'ADOPT-' + new Date().getFullYear() + '-' + Math.floor(10000 + Math.random() * 90000);
                    document.getElementById('application-id').textContent = applicationId;
                    
                    // Show success message
                    adoptionForm.classList.add('hidden');
                    successMessage.classList.remove('hidden');
                    
                    // Scroll to success message
                    setTimeout(() => {
                        successMessage.scrollIntoView({ behavior: 'smooth' });
                    }, 100);
                    
                    // You could also redirect to a success page
                    // window.location.href = data.redirect_url;
                } else {
                    // Handle validation errors
                    if (data.errors) {
                        // Loop through errors and display them
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.getElementById(field + '-error');
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                                errorElement.classList.remove('hidden');
                            }
                        });
                        
                        // Show the step with the first error
                        const firstErrorField = Object.keys(data.errors)[0];
                        if (firstErrorField) {
                            // Determine which step the field is in
                            let errorStep = 1;
                            if (['animal_id', 'previous_pet', 'adoption_reason', 'home_environment'].includes(firstErrorField)) {
                                errorStep = 2;
                            } else if (firstErrorField === 'terms') {
                                errorStep = 3;
                            }
                            showStep(errorStep);
                        }
                    }
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                alert('An error occurred. Please try again.');
            });
        });
    }
    
    // Initialize progress bar
    updateProgress();
</script>
@endpush