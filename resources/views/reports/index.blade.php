@extends('layouts.app')
@section('content')
<h4>Reports</h4>
<p><a href="{{ route('reports.pdf') }}" class="btn btn-secondary btn-sm">PDF</a></p>
<table class="table table-striped">
    <thead>
        <tr><th>#</th><th>Item</th><th>Reporter</th><th>Date</th><th>Status</th></tr>
    </thead>
            </thead>
            <tbody>
                @forelse($records as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
<td>{{ $r->lostItem->item_name }}</td>
<td>{{ $r->reporter->name }}</td>
                    <td>{{ $r->reported_date ? $r->reported_date->format('M d, Y') : '—' }}</td>
                    <td>{{ $r->claimed_date ? $r->claimed_date->format('M d, Y') : '—' }}</td>
                    <td>
                        <span class="badge bg-{{ $r->status === 'collected' ? 'success' : 'info' }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">No records.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection