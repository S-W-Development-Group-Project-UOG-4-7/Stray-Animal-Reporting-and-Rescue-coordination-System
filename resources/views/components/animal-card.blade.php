@props(['animal'])

<div class="pet-card animate-slide-in" 
     data-type="{{ $animal['type'] }}" 
     data-age="{{ $animal['age'] }}" 
     data-gender="{{ $animal['gender'] }}" 
     data-needs="{{ $animal['needs'] }}">
    <div class="relative">
        <img src="{{ $animal['image'] }}" 
             alt="{{ $animal['name'] }}" 
             class="pet-image">
        <span class="pet-status {{ $animal['status_class'] }}">{{ $animal['status'] }}</span>
    </div>
    <h3 class="mb-2 text-2xl font-bold">{{ $animal['name'] }}</h3>
    <div class="flex items-center mb-4 text-gray-300">
        <i class="mr-2 {{ $animal['icon'] }}"></i>
        <span>{{ $animal['breed'] }} • {{ ucfirst($animal['gender']) }} • {{ $animal['age_display'] }}</span>
    </div>
    <p class="mb-6 text-gray-300">{{ $animal['description'] }}</p>
    <div class="mb-6">
        <h4 class="mb-2 font-bold text-cyan-300">Rescue Team Info</h4>
        <p class="text-sm text-gray-300">{{ $animal['rescue_info'] }}</p>
    </div>
    <div class="flex items-center justify-between">
        <span class="px-3 py-1 text-sm rounded-full {{ $animal['health_class'] }}">
            <i class="mr-1 {{ $animal['health_icon'] }}"></i> {{ $animal['health_status'] }}
        </span>
        <a href="#adopt-form" class="px-4 py-2 text-sm font-medium transition-all duration-300 rounded-full {{ $animal['button_class'] }}">
            <i class="mr-2 {{ $animal['button_icon'] }}"></i> {{ $animal['button_text'] }}
        </a>
    </div>
</div>