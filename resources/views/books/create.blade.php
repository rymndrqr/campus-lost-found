@extends('layouts.app')
@section('content')
<h4 class="mb-4">Add New Book</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
                @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}">
                @error('isbn') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Number of Copies</label>
                <input type="number" name="total_copies" class="form-control" value="{{ old('total_copies', 1) }}" min="1">
            </div>
            <button type="submit" class="btn btn-primary">Save Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection