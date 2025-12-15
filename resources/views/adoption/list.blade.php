@extends('layouts.app')

@section('title', 'Adopt a Friend — SafePaws')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
        <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
        <div class="px-5 container-custom">
            <div class="text-center">
                <h1 class="mb-6 title">
                    Find Your <span class="gradient-text">Forever Friend</span>
                </h1>
                <p class="max-w-3xl mx-auto mb-10 subtitle">
                    Browse our loving animals waiting for their forever homes. Each one has a unique story and is ready to bring joy to your life.
                </p>
                
                <div class="flex flex-col items-center gap-4 sm:flex-row">
                    <a href="#adoption-list" class="primary-btn animate-slide-in">
                        <i class="fas fa-heart"></i>
                        Browse All Animals
                    </a>
                    <a href="#how-to-adopt" class="secondary-btn animate-slide-in">
                        <i class="fas fa-question-circle"></i>
                        How to Adopt
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Filters Section -->
    <section id="search-filters" class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
        <div class="container-custom">
            <div class="max-w-6xl mx-auto">
                <!-- Search Bar -->
                <div class="mb-8 card">
                    <div class="relative">
                        <i class="absolute text-xl fas fa-search left-6 top-5 text-cyan-400"></i>
                        <input type="text" id="search-input" 
                               class="w-full py-5 pl-16 pr-6 text-lg transition-all duration-300 border bg-white/10 border-white/20 rounded-2xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30"
                               placeholder="Search by name, breed, or description...">
                        <button id="clear-search" class="absolute hidden text-gray-400 right-6 top-5 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="grid gap-8 mb-12 md:grid-cols-4">
                    <!-- Animal Type Filter -->
                    <div class="card">
                        <h3 class="mb-4 text-xl font-bold gradient-text">Animal Type</h3>
                        <div class="space-y-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="type" value="dog" checked>
                                <span>Dogs <span class="text-gray-400">(24)</span></span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="type" value="cat" checked>
                                <span>Cats <span class="text-gray-400">(18)</span></span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="type" value="other">
                                <span>Other Animals <span class="text-gray-400">(7)</span></span>
                            </label>
                        </div>
                    </div>

                    <!-- Age Filter -->
                    <div class="card">
                        <h3 class="mb-4 text-xl font-bold gradient-text">Age</h3>
                        <div class="space-y-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="age" value="puppy">
                                <span>Puppy/Kitten (< 1 year)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="age" value="young">
                                <span>Young (1-3 years)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="age" value="adult">
                                <span>Adult (3-8 years)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="age" value="senior">
                                <span>Senior (8+ years)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Gender Filter -->
                    <div class="card">
                        <h3 class="mb-4 text-xl font-bold gradient-text">Gender</h3>
                        <div class="space-y-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="gender" value="male" checked>
                                <span>Male</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="gender" value="female" checked>
                                <span>Female</span>
                            </label>
                        </div>
                    </div>

                    <!-- Special Needs -->
                    <div class="card">
                        <h3 class="mb-4 text-xl font-bold gradient-text">Special Needs</h3>
                        <div class="space-y-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="needs" value="medical">
                                <span>Medical Care Needed</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="needs" value="disability">
                                <span>Disability</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="needs" value="behavioral">
                                <span>Behavioral Training</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-3 rounded-sm" data-filter="needs" value="none">
                                <span>No Special Needs</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Quick Filter Tags -->
                <div class="mb-8">
                    <h3 class="mb-4 text-xl font-bold">Quick Filters</h3>
                    <div class="flex flex-wrap">
                        <span class="filter-tag active" data-filter-tag="all">All Animals</span>
                        <span class="filter-tag" data-filter-tag="ready">Ready for Adoption</span>
                        <span class="filter-tag" data-filter-tag="puppies">Puppies</span>
                        <span class="filter-tag" data-filter-tag="kittens">Kittens</span>
                        <span class="filter-tag" data-filter-tag="seniors">Seniors</span>
                        <span class="filter-tag" data-filter-tag="special">Special Needs</span>
                    </div>
                </div>

                <!-- Sort Options -->
                <div class="flex flex-col justify-between gap-4 mb-8 md:flex-row md:items-center">
                    <div>
                        <span class="text-gray-300">Showing <span id="animal-count">12</span> of <span id="total-animals">49</span> animals</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-300">Sort by:</span>
                        <select id="sort-options" class="px-4 py-2 transition-all duration-300 border rounded-lg bg-white/10 border-white/20 focus:outline-none focus:border-cyan-500">
                            <option value="newest">Newest Arrivals</option>
                            <option value="oldest">Oldest Residents</option>
                            <option value="name-asc">Name (A-Z)</option>
                            <option value="name-desc">Name (Z-A)</option>
                            <option value="age-young">Age (Youngest)</option>
                            <option value="age-old">Age (Oldest)</option>
                        </select>
                        <button id="reset-filters" class="px-4 py-2 text-sm text-gray-400 transition-colors duration-300 rounded-lg hover:text-white hover:bg-white/10">
                            <i class="mr-2 fas fa-redo"></i>
                            Reset All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adoption Listings -->
    <section id="adoption-list" class="section-padding">
        <div class="container-custom">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Animal Card 1 -->
                <div class="pet-card animate-slide-in" data-type="dog" data-age="puppy" data-gender="male" data-needs="none">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=b450674e8e1baa1a25e8e77b6d9a4d4f" 
                             alt="Golden Retriever Puppy" 
                             class="pet-image">
                        <span class="pet-status available">Available</span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold">Max</h3>
                    <div class="flex items-center mb-4 text-gray-300">
                        <i class="mr-2 fas fa-dog"></i>
                        <span>Golden Retriever • Male • 4 months</span>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Friendly and energetic puppy rescued from a breeding facility. Loves playing fetch and cuddling.
                    </p>
                    <div class="mb-6">
                        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
                        <p class="text-sm text-gray-300">Rescued by Team Alpha on March 15, 2024. Fully vaccinated and microchipped.</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">
                            <i class="mr-1 fas fa-shield-alt"></i> Healthy
                        </span>
                        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full gradient-bg hover:shadow-lg hover:shadow-cyan-500/30">
                            <i class="mr-2 fas fa-heart"></i> Adopt Me
                        </a>
                    </div>
                </div>

                <!-- Animal Card 2 -->
                <div class="pet-card animate-slide-in" data-type="cat" data-age="adult" data-gender="female" data-needs="medical">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1514888286974-6d03bde4ba14?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=39e5b5e5b9b5b5b5b5b5b5b5b5b5b5" 
                             alt="Calico Cat" 
                             class="pet-image">
                        <span class="pet-status pending">Pending Review</span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold">Luna</h3>
                    <div class="flex items-center mb-4 text-gray-300">
                        <i class="mr-2 fas fa-cat"></i>
                        <span>Calico • Female • 3 years</span>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Gentle and affectionate cat rescued from the streets. Requires ongoing medication for a thyroid condition.
                    </p>
                    <div class="mb-6">
                        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
                        <p class="text-sm text-gray-300">Found injured in an alley, rescued by Team Bravo. Recovered well after surgery.</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 text-sm rounded-full bg-yellow-500/20 text-yellow-400">
                            <i class="mr-1 fas fa-heartbeat"></i> Medical Needs
                        </span>
                        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full bg-white/10 hover:bg-white/20">
                            <i class="mr-2 fas fa-info-circle"></i> Learn More
                        </a>
                    </div>
                </div>

                <!-- Animal Card 3 -->
                <div class="pet-card animate-slide-in" data-type="dog" data-age="senior" data-gender="male" data-needs="behavioral">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=3b5b5b5b5b5b5b5b5b5b5b5b5b5b5b5" 
                             alt="Senior Labrador" 
                             class="pet-image">
                        <span class="pet-status available">Available</span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold">Buddy</h3>
                    <div class="flex items-center mb-4 text-gray-300">
                        <i class="mr-2 fas fa-dog"></i>
                        <span>Labrador • Male • 10 years</span>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Calm and loyal senior dog. House-trained and good with children. Needs patient owner for behavioral training.
                    </p>
                    <div class="mb-6">
                        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
                        <p class="text-sm text-gray-300">Surrendered by previous owner, rescued by Team Charlie. Undergoing behavioral therapy.</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 text-sm rounded-full bg-purple-500/20 text-purple-400">
                            <i class="mr-1 fas fa-brain"></i> Training Needed
                        </span>
                        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full gradient-bg hover:shadow-lg hover:shadow-cyan-500/30">
                            <i class="mr-2 fas fa-heart"></i> Adopt Me
                        </a>
                    </div>
                </div>

                <!-- Animal Card 4 -->
                <div class="pet-card animate-slide-in" data-type="cat" data-age="young" data-gender="female" data-needs="none">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=3b5b5b5b5b5b5b5b5b5b5b5b5b5b5b5" 
                             alt="Siamese Cat" 
                             class="pet-image">
                        <span class="pet-status reserved">Reserved</span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold">Mittens</h3>
                    <div class="flex items-center mb-4 text-gray-300">
                        <i class="mr-2 fas fa-cat"></i>
                        <span>Siamese • Female • 2 years</span>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Playful and vocal Siamese cat. Loves attention and interactive toys. Good with other cats.
                    </p>
                    <div class="mb-6">
                        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
                        <p class="text-sm text-gray-300">Rescued from a hoarding situation by Team Delta. Fully rehabilitated and healthy.</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">
                            <i class="mr-1 fas fa-shield-alt"></i> Healthy
                        </span>
                        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full bg-white/10 hover:bg-white/20">
                            <i class="mr-2 fas fa-user-check"></i> Adoption Pending
                        </a>
                    </div>
                </div>

                <!-- Animal Card 5 -->
                <div class="pet-card animate-slide-in" data-type="other" data-age="young" data-gender="female" data-needs="none">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1593085512500-5d55148d6f0d?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=3b5b5b5b5b5b5b5b5b5b5b5b5b5b5b5" 
                             alt="Rabbit" 
                             class="pet-image">
                        <span class="pet-status available">Available</span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold">Cotton</h3>
                    <div class="flex items-center mb-4 text-gray-300">
                        <i class="mr-2 fas fa-paw"></i>
                        <span>Rabbit • Female • 1 year</span>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Gentle and curious rabbit. Litter-trained and enjoys exploring. Would do best in a calm home.
                    </p>
                    <div class="mb-6">
                        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
                        <p class="text-sm text-gray-300">Found abandoned in a park, rescued by Team Echo. Healthy and ready for adoption.</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">
                            <i class="mr-1 fas fa-shield-alt"></i> Healthy
                        </span>
                        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full gradient-bg hover:shadow-lg hover:shadow-cyan-500/30">
                            <i class="mr-2 fas fa-heart"></i> Adopt Me
                        </a>
                    </div>
                </div>

                <!-- Animal Card 6 -->
                <div class="pet-card animate-slide-in" data-type="dog" data-age="puppy" data-gender="female" data-needs="disability">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=3b5b5b5b5b5b5b5b5b5b5b5b5b5b5b5" 
                             alt="Disabled Puppy" 
                             class="pet-image">
                        <span class="pet-status available">Available</span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold">Hope</h3>
                    <div class="flex items-center mb-4 text-gray-300">
                        <i class="mr-2 fas fa-dog"></i>
                        <span>Mixed Breed • Female • 6 months</span>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Sweet puppy born with a leg deformity. Gets around well with a custom wheelchair. Full of love and energy.
                    </p>
                    <div class="mb-6">
                        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
                        <p class="text-sm text-gray-300">Rescued from neglectful situation by Team Foxtrot. Received surgery and wheelchair.</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 text-sm rounded-full bg-pink-500/20 text-pink-400">
                            <i class="mr-1 fas fa-wheelchair"></i> Special Needs
                        </span>
                        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full gradient-bg hover:shadow-lg hover:shadow-cyan-500/30">
                            <i class="mr-2 fas fa-heart"></i> Adopt Me
                        </a>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="mt-16 text-center">
                <button id="load-more" class="primary-btn">
                    <i class="mr-2 fas fa-plus"></i>
                    Load More Animals
                </button>
            </div>
        </div>
    </section>

    <!-- How to Adopt Section -->
    <section id="how-to-adopt" class="section-padding bg-gradient-to-b from-transparent to-cyan-900/10">
        <div class="container-custom">
            <div class="mb-16 text-center">
                <h2 class="section-title">How to Adopt</h2>
                <p class="section-subtitle">
                    Our adoption process is designed to ensure the best match between you and your new companion
                </p>
            </div>
            
            <div class="grid gap-8 md:grid-cols-4">
                <div class="text-center card">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-2xl rounded-full gradient-bg">
                        <i class="text-white fas fa-search"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold">1. Browse & Select</h3>
                    <p class="text-gray-300">Look through our available animals and find one that matches your lifestyle.</p>
                </div>
                
                <div class="text-center card">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-2xl rounded-full gradient-bg">
                        <i class="text-white fas fa-file-alt"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold">2. Submit Application</h3>
                    <p class="text-gray-300">Fill out our adoption application with your details and preferences.</p>
                </div>
                
                <div class="text-center card">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-2xl rounded-full gradient-bg">
                        <i class="text-white fas fa-handshake"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold">3. Meet & Greet</h3>
                    <p class="text-gray-300">Schedule a visit to meet your potential new companion in person.</p>
                </div>
                
                <div class="text-center card">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-2xl rounded-full gradient-bg">
                        <i class="text-white fas fa-home"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold">4. Welcome Home</h3>
                    <p class="text-gray-300">Complete the adoption and bring your new family member home!</p>
                </div>
            </div>
            
            <div class="max-w-3xl mx-auto mt-12 text-center card">
                <h3 class="mb-4 text-2xl font-bold">Ready to Adopt?</h3>
                <p class="mb-6 text-gray-300">
                    Our adoption fee includes spay/neuter, vaccinations, microchip, and a health check. 
                    All animals are evaluated for temperament and behavior before adoption.
                </p>
                <a href="#adopt-form" class="primary-btn">
                    <i class="mr-2 fas fa-file-contract"></i>
                    Start Adoption Application
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Adoption listing functionality
    const searchInput = document.getElementById('search-input');
    const clearSearchBtn = document.getElementById('clear-search');
    const filterCheckboxes = document.querySelectorAll('input[data-filter]');
    const filterTags = document.querySelectorAll('.filter-tag');
    const sortOptions = document.getElementById('sort-options');
    const resetFiltersBtn = document.getElementById('reset-filters');
    const animalCards = document.querySelectorAll('.pet-card');
    const animalCount = document.getElementById('animal-count');
    const totalAnimals = document.getElementById('total-animals');
    const loadMoreBtn = document.getElementById('load-more');

    // Track active filters
    let activeFilters = {
        type: ['dog', 'cat'],
        age: [],
        gender: ['male', 'female'],
        needs: []
    };

    let activeSearch = '';
    let activeSort = 'newest';

    // Initialize total animals count
    totalAnimals.textContent = animalCards.length;

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            activeSearch = this.value.toLowerCase();
            
            if (activeSearch.length > 0) {
                clearSearchBtn.classList.remove('hidden');
            } else {
                clearSearchBtn.classList.add('hidden');
            }
            
            filterAnimals();
        });
    }

    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', function() {
            searchInput.value = '';
            activeSearch = '';
            this.classList.add('hidden');
            filterAnimals();
        });
    }

    // Filter checkbox handling
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const filterType = this.getAttribute('data-filter');
            const filterValue = this.value;
            
            if (this.checked) {
                if (!activeFilters[filterType].includes(filterValue)) {
                    activeFilters[filterType].push(filterValue);
                }
            } else {
                const index = activeFilters[filterType].indexOf(filterValue);
                if (index > -1) {
                    activeFilters[filterType].splice(index, 1);
                }
            }
            
            filterAnimals();
        });
    });

    // Quick filter tags
    filterTags.forEach(tag => {
        tag.addEventListener('click', function() {
            // Remove active class from all tags
            filterTags.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tag
            this.classList.add('active');
            
            const filterTag = this.getAttribute('data-filter-tag');
            
            // Reset all filters first
            resetAllFilters();
            
            // Apply quick filter
            switch(filterTag) {
                case 'ready':
                    // Show only available animals
                    activeFilters.needs = ['none'];
                    break;
                case 'puppies':
                    activeFilters.age = ['puppy'];
                    break;
                case 'kittens':
                    activeFilters.type = ['cat'];
                    activeFilters.age = ['puppy'];
                    break;
                case 'seniors':
                    activeFilters.age = ['senior'];
                    break;
                case 'special':
                    activeFilters.needs = ['medical', 'disability', 'behavioral'];
                    break;
                case 'all':
                default:
                    // Show all
                    break;
            }
            
            // Update checkboxes
            updateCheckboxes();
            filterAnimals();
        });
    });

    // Sort functionality
    if (sortOptions) {
        sortOptions.addEventListener('change', function() {
            activeSort = this.value;
            sortAnimals();
        });
    }

    // Reset all filters
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', resetAllFilters);
    }

    // Load more animals
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // In a real app, this would load more data from server
            // For demo, we'll just show a message
            this.innerHTML = '<i class="mr-2 fas fa-check"></i> All animals loaded';
            this.disabled = true;
            this.classList.remove('gradient-bg');
            this.classList.add('bg-gray-600');
            
            setTimeout(() => {
                alert('In a real application, this would load more animals from the server. For this demo, all animals are already displayed.');
            }, 500);
        });
    }

    // Filter animals based on active filters and search
    function filterAnimals() {
        let visibleCount = 0;
        
        animalCards.forEach(card => {
            const type = card.getAttribute('data-type');
            const age = card.getAttribute('data-age');
            const gender = card.getAttribute('data-gender');
            const needs = card.getAttribute('data-needs');
            
            const name = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();
            
            // Check search
            const matchesSearch = !activeSearch || 
                name.includes(activeSearch) || 
                description.includes(activeSearch);
            
            // Check filters
            const matchesType = activeFilters.type.length === 0 || activeFilters.type.includes(type);
            const matchesAge = activeFilters.age.length === 0 || activeFilters.age.includes(age);
            const matchesGender = activeFilters.gender.length === 0 || activeFilters.gender.includes(gender);
            const matchesNeeds = activeFilters.needs.length === 0 || activeFilters.needs.includes(needs);
            
            if (matchesSearch && matchesType && matchesAge && matchesGender && matchesNeeds) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });
        
        // Update animal count
        animalCount.textContent = visibleCount;
        
        // Sort animals
        sortAnimals();
    }

    // Sort animals based on active sort option
    function sortAnimals() {
        const container = document.getElementById('adoption-list');
        const cards = Array.from(animalCards).filter(card => !card.classList.contains('hidden'));
        
        cards.sort((a, b) => {
            const aName = a.querySelector('h3').textContent;
            const bName = b.querySelector('h3').textContent;
            const aAge = a.getAttribute('data-age');
            const bAge = b.getAttribute('data-age');
            
            // Age mapping for sorting
            const ageOrder = { 'puppy': 0, 'young': 1, 'adult': 2, 'senior': 3 };
            
            switch(activeSort) {
                case 'name-asc':
                    return aName.localeCompare(bName);
                case 'name-desc':
                    return bName.localeCompare(aName);
                case 'age-young':
                    return ageOrder[aAge] - ageOrder[bAge];
                case 'age-old':
                    return ageOrder[bAge] - ageOrder[aAge];
                case 'oldest':
                    // For demo, we'll sort by status (available first)
                    const aStatus = a.querySelector('.pet-status').classList.contains('available') ? 0 : 1;
                    const bStatus = b.querySelector('.pet-status').classList.contains('available') ? 0 : 1;
                    return aStatus - bStatus;
                case 'newest':
                default:
                    // Default order (as in HTML)
                    return 0;
            }
        });
        
        // Reorder cards in DOM
        cards.forEach(card => {
            container.appendChild(card);
        });
    }

    // Reset all filters to default
    function resetAllFilters() {
        // Reset active filters
        activeFilters = {
            type: ['dog', 'cat'],
            age: [],
            gender: ['male', 'female'],
            needs: []
        };
        
        // Reset search
        if (searchInput) {
            searchInput.value = '';
            activeSearch = '';
            clearSearchBtn.classList.add('hidden');
        }
        
        // Reset sort
        if (sortOptions) {
            sortOptions.value = 'newest';
            activeSort = 'newest';
        }
        
        // Reset filter tags
        filterTags.forEach(tag => {
            if (tag.getAttribute('data-filter-tag') === 'all') {
                tag.classList.add('active');
            } else {
                tag.classList.remove('active');
            }
        });
        
        // Update checkboxes
        updateCheckboxes();
        
        // Reapply filters
        filterAnimals();
    }

    // Update checkbox states based on active filters
    function updateCheckboxes() {
        filterCheckboxes.forEach(checkbox => {
            const filterType = checkbox.getAttribute('data-filter');
            const filterValue = checkbox.value;
            
            if (activeFilters[filterType].includes(filterValue)) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
        });
    }
</script>
@endpush