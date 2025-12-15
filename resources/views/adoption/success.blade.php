@extends('layouts.app')

@section('title', 'Adoption Application Submitted — SafePaws')

@section('content')
    <section class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
        <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
        <div class="px-5 container-custom">
            <div class="max-w-3xl mx-auto text-center">
                <div class="mb-6 success-checkmark animate-slide-in"></div>
                <h1 class="mb-6 title">
                    Application <span class="gradient-text">Submitted</span>
                </h1>
                <p class="mb-10 subtitle">
                    Thank you for your interest in adopting from SafePaws.
                </p>
                
                <div class="max-w-md mx-auto mb-6 card bg-white/5 animate-slide-in">
                    <p class="mb-2 text-gray-400">Your Application ID:</p>
                    <p class="text-2xl font-bold gradient-text">{{ session('application_id', $applicationId) }}</p>
                    <p class="mt-3 text-sm text-gray-300">
                        <i class="mr-1 fas fa-info-circle"></i>
                        Keep this ID for future reference
                    </p>
                </div>
                
                <div class="mb-8 card animate-slide-in">
                    <h3 class="mb-4 text-xl font-bold">What happens next?</h3>
                    <div class="space-y-4 text-left">
                        <div class="flex items-start gap-3">
                            <div class="flex items-center justify-center w-8 h-8 mt-1 rounded-full gradient-bg">
                                <i class="text-white fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="font-bold">Confirmation Email</p>
                                <p class="text-sm text-gray-300">You'll receive a confirmation email within 24 hours.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex items-center justify-center w-8 h-8 mt-1 rounded-full gradient-bg">
                                <i class="text-white fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="font-bold">Application Review</p>
                                <p class="text-sm text-gray-300">Our team will review your application within 3-5 business days.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex items-center justify-center w-8 h-8 mt-1 rounded-full gradient-bg">
                                <i class="text-white fas fa-calendar-check"></i>
                            </div>
                            <div>
                                <p class="font-bold">Next Steps</p>
                                <p class="text-sm text-gray-300">If approved, we'll contact you to schedule a meet & greet.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
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
    </section>
@endsection