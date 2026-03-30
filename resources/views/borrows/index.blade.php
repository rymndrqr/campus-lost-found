@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>🔄 Borrow Records</h4>
    <a href="{{ route('borrows.create') }}" class="btn btn-primary">+ New Borrow</a>
</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Book</th><th>Member</th><th>Borrowed</th><th>Due Date</th><th>Status</th><th>Action</th></tr>
            </thead>
            <tbody>
                @forelse($borrows as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->book->title }}</td>
                    <td>{{ $b->member->name }}</td>
                    <td>{{ $b->borrowed_at->format('M d, Y') }}</td>
                    <td>{{ $b->due_date->format('M d, Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $b->status === 'returned' ? 'success' : ($b->status === 'overdue' ? 'danger' : 'warning text-dark') }}">
                            {{ ucfirst($b->status) }}
                        </span>
                    </td>
                    <td>
                        @if($b->status === 'borrowed')
                        <form action="{{ route('borrows.return', $b) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-success" onclick="return confirm('Mark as returned?')">Return</button>
                        </form>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">No borrow records yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $borrows->links() }}</div>
@endsection