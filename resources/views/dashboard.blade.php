@extends('layouts.app')
@section('content')
<h4 class="mb-4">📊 Campus Lost & Found Dashboard</h4>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6>Total Lost Items</h6>
                <h2>{{ $totalLostItems }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6>Total Reporters</h6>
                <h2>{{ $totalReporters }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6>Unclaimed Items</h6>
                <h2>{{ $unclaimedCount }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h6>Pending Claims</h6>
                <h2>{{ $pendingClaims }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><strong>Recent Claims</strong></div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Item</th><th>Reporter</th><th>Reported</th><th>Status</th></tr>
            </thead>
            <tbody>
                @forelse($recentClaims as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->lostItem->item_name ?? 'N/A' }}</td>
                    <td>{{ $c->reporter->name ?? 'N/A' }}</td>
                    <td>{{ $c->reported_date ? $c->reported_date->format('M d, Y') : 'N/A' }}</td>
                    <td>
                        <span class="badge bg-{{ $c->status === 'collected' ? 'success' : ($c->status === 'claimed' ? 'warning text-dark' : 'info') }}">
                            {{ ucfirst($c->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No claims yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
