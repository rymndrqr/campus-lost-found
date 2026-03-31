@extends('layouts.app')
@section('content')
<h4>Lost Items</h4>
<p><a href="{{ route('lost-items.create') }}" class="btn btn-primary btn-sm">+ New</a></p>
<table class="table table-striped">
    <thead>
        <tr><th>Item</th><th>Description</th><th>Category</th><th>Location</th><th>Date</th><th>Status</th><th></th></tr>
    </thead>
            <tbody>
                @forelse($lostItems as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ Str::limit($item->description, 50) }}</td>
                    <td><span class="badge bg-info">{{ $item->category }}</span></td>
                    <td>{{ $item->location_found }}</td>
                    <td>{{ $item->date_found->format('M d, Y') }}</td>
                    <td>
                        <span class="badge {{ $item->unclaimed ? 'bg-warning' : 'bg-success' }}">
                            {{ $item->unclaimed ? 'Unclaimed' : 'Claimed' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('lost-items.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('lost-items.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">No lost items yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $lostItems->links() }}</div>
@endsection
