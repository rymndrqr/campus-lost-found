@extends('layouts.app')
@section('content')
<h4>Dashboard</h4>
<p><a href="{{ route('reports.index') }}" class="btn btn-secondary btn-sm">Reports</a></p>
<table class="table table-striped">
    <thead>
        <tr><th>Stat</th><th>Value</th></tr>
    </thead>
    <tbody>
        <tr><td>Total Lost Items</td><td class="fw-bold">{{ $totalLostItems }}</td></tr>
        <tr><td>Total Reporters</td><td class="fw-bold">{{ $totalReporters }}</td></tr>
        <tr><td>Unclaimed Items</td><td class="fw-bold">{{ $unclaimedCount }}</td></tr>
        <tr><td>Pending Claims</td><td class="fw-bold">{{ $pendingClaims }}</td></tr>
    </tbody>
</table>

<h5 class="mt-5">Recent Claims</h5>
<table class="table table-striped">
    <thead>
        <tr><th>#</th><th>Item</th><th>Reporter</th><th>Date</th><th>Status</th></tr>
    </thead>
    <tbody>
        @forelse($recentClaims as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->lostItem->item_name ?? 'N/A' }}</td>
            <td>{{ $c->reporter->name ?? 'N/A' }}</td>
            <td>{{ $c->reported_date ? $c->reported_date->format('M d, Y') : 'N/A' }}</td>
            <td><span class="badge {{ $c->status === 'collected' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($c->status) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">No claims.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection

