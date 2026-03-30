@extends('layouts.app')
@section('content')
<h4 class="mb-4">Edit Book</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $book->category) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Total Copies</label>
                <input type="number" name="total_copies" class="form-control" value="{{ old('total_copies', $book->total_copies) }}" min="1">
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection