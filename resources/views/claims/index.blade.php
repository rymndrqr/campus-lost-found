@extends('layouts.app')
@section('content')
<h4>Claims</h4>
<p><a href="{{ route('claims.create') }}" class="btn btn-primary btn-sm">+ New</a></p>
<table class="table table-striped">
    <thead>
        <tr><th>#</th><th>Item</th><th>Reporter</th><th>Claimant</th><th>Date</th><th>Status</th><th></th></tr>
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
