@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>📖 Books</h4>
    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Add Book</a>
</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Title</th><th>Author</th><th>ISBN</th><th>Category</th><th>Available</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->available_copies }} / {{ $book->total_copies }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">No books yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $books->links() }}</div>
@endsection