@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>✅ Claim Records</h4>
    <a href="{{ route('claims.create') }}" class="btn btn-primary">+ New Claim</a>
</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Item</th><th>Reporter</th><th>Claimant</th><th>Reported</th><th>Status</th><th>Action</th></tr>
            </thead>
            <tbody>
                @forelse($claims as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->lostItem->item_name }}</td>
                    <td>{{ $c->reporter->name }}</td>
                    <td>{{ $c->claimant_name }} ({{ $c->claimant_phone }})</td>
                    <td>{{ $c->reported_date->format('M d, Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $c->status === 'collected' ? 'success' : ($c->status === 'claimed' ? 'warning text-dark' : 'info') }}">
                            {{ ucfirst($c->status) }}
                        </span>
                    </td>
                    <td>
                        @if($c->status === 'reported' || $c->status === 'claimed')
                        <form action="{{ route('claims.collect', $c) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-success" onclick="return confirm('Mark as collected?')">Collect</button>
                        </form>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">No claim records yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $claims->links() }}</div>
@endsection
