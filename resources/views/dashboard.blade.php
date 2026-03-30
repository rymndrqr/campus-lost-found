@extends('layouts.app')
@section('content')
<h4 class="mb-4">📊 Dashboard</h4>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6>Total Books</h6>
                <h2>{{ $totalBooks }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6>Total Members</h6>
                <h2>{{ $totalMembers }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6>Active Borrows</h6>
                <h2>{{ $activeBorrows }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h6>Overdue</h6>
                <h2>{{ $overdueCount }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><strong>Recent Borrowing Transactions</strong></div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Book</th><th>Member</th><th>Due Date</th><th>Status</th></tr>
            </thead>
            <tbody>
                @forelse($recentBorrows as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->book->title }}</td>
                    <td>{{ $b->member->name }}</td>
                    <td>{{ $b->due_date->format('M d, Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $b->status === 'returned' ? 'success' : ($b->status === 'overdue' ? 'danger' : 'warning') }}">
                            {{ ucfirst($b->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No records yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection