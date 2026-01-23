@extends('layouts.app')

@section('title', 'SafePaws — Protecting Every Paw')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
        <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
        <div class="px-5 container-custom">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="text-left">
                    <h1 class="mb-6 title">
                        Giving Hope to <span class="gradient-text">Every Paw</span>
                    </h1>
                    <p class="mb-10 subtitle">
                        SafePaws is dedicated to rescuing, protecting, and finding loving homes for animals in need. 
                        Join us in making a difference, one paw at a time.
                    </p>
                    
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <a href="#report" class="primary-btn animate-slide-in">
                            <i class="fas fa-bullhorn"></i>
                            Report Animal in Need
                        </a>
                        <a href="{{ route('adoption.list') }}" class="secondary-btn animate-slide-in">
                            <i class="fas fa-heart"></i>
                            Adopt a Friend
                        </a>
                    </div>
                </div>
                
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=3b5b5b5b5b5b5b5b5b5b5b5b5b5b5b5" 
                         alt="Happy Dog" 
                         class="rounded-3xl shadow-2xl shadow-cyan-500/30 animate-float">
                </div>
            </div>
        </div>
    </section>

    <!-- Other sections from your original index.html would go here -->
    <!-- About, Our Work, Success Stories, etc. -->
@endsection