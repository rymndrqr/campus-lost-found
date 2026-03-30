@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>👤 Reporters</h4>
    <a href="{{ route('reporters.create') }}" class="btn btn-primary">+ Add Reporter</a>
</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Name</th><th>Email</th><th>Phone</th><th>Dorm</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($reporters as $reporter)
                <tr>
                    <td>{{ $reporter->name }}</td>
                    <td>{{ $reporter->email }}</td>
                    <td>{{ $reporter->phone }}</td>
                    <td>{{ $reporter->dorm ?? '—' }}</td>
                    <td>
                        <a href="{{ route('reporters.edit', $reporter) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('reporters.destroy', $reporter) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No reporters yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $reporters->links() }}</div>
@endsection
