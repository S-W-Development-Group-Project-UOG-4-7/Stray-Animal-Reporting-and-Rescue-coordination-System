@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $animal->name ?? 'Unnamed Animal' }}</h2>

    @if($animal->image)
        <img src="{{ asset('storage/' . $animal->image) }}" width="300" class="mb-3">
    @endif

    <p><strong>Species:</strong> {{ $animal->species }}</p>
    <p><strong>Condition:</strong> {{ $animal->condition }}</p>
    <p><strong>Description:</strong> {{ $animal->description }}</p>

    <a href="{{ route('adoption.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
