@extends('layouts.app')
@section('content')
<h4 class="mb-4">Edit Lost Item</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('lost-items.update', $lostItem) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Item Name</label>
                <input type="text" name="item_name" class="form-control" value="{{ old('item_name', $lostItem->item_name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $lostItem->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $lostItem->category) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Location Found</label>
                <input type="text" name="location_found" class="form-control" value="{{ old('location_found', $lostItem->location_found) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Date Found</label>
                <input type="date" name="date_found" class="form-control" value="{{ old('date_found', $lostItem->date_found) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
            <a href="{{ route('lost-items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
