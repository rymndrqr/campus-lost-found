@extends('layouts.app')
@section('content')
<h4 class="mb-4">Report New Lost Item</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('lost-items.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Item Name</label>
                <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}">
                @error('item_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Location Found</label>
                <input type="text" name="location_found" class="form-control @error('location_found') is-invalid @enderror" value="{{ old('location_found') }}">
                @error('location_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Date Found</label>
                <input type="date" name="date_found" class="form-control @error('date_found') is-invalid @enderror" value="{{ old('date_found', date('Y-m-d')) }}">
                @error('date_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Report Item</button>
            <a href="{{ route('lost-items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
