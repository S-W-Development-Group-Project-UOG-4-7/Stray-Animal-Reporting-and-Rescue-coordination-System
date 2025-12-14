@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Animal for Adoption</h2>

    <form action="{{ route('adoption.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name (optional)</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Species</label>
            <select name="species" class="form-control" required>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Condition</label>
            <input type="text" name="condition" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
