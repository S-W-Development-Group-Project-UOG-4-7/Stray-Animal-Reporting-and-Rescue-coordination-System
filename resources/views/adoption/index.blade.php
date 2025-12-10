@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Animals Available for Adoption</h2>

    <a href="{{ route('adoption.create') }}" class="btn btn-primary mb-3">Add New Animal</a>

    <div class="row">
        @forelse($animals as $animal)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($animal->image)
                        <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" alt="Animal Image">
                    @endif

                    <div class="card-body">
                        <h5>{{ $animal->name ?? 'Unnamed' }}</h5>
                        <p>Species: {{ $animal->species }}</p>
                        <p>Condition: {{ $animal->condition }}</p>

                        <a href="{{ route('adoption.show', $animal->id) }}" class="btn btn-success">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No animals available right now.</p>
        @endforelse
    </div>
</div>
@endsection
