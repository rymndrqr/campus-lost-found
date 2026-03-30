@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h4>📄 Claim Report</h4>
    <a href="{{ route('reports.pdf') }}" class="btn btn-danger">
        <i class="bi bi-file-earmark-pdf"></i> Download PDF
    </a>
</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-dark">
<th>Item Name</th><th>Reporter</th><th>Claimant</th><th>Reported</th><th>Claimed</th><th>Status</th></tr>
            </thead>
            <tbody>
                @forelse($records as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
<td>{{ $r->lostItem->item_name }}</td>
<td>{{ $r->reporter->name }}</td>
                    <td>{{ $r->borrowed_at->format('M d, Y') }}</td>
                    <td>{{ $r->due_date->format('M d, Y') }}</td>
                    <td>{{ $r->returned_at ? $r->returned_at->format('M d, Y') : '—' }}</td>
                    <td>
                        <span class="badge bg-{{ $r->status === 'returned' ? 'success' : ($r->status === 'overdue' ? 'danger' : 'warning text-dark') }}">
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