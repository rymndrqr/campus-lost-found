@extends('layouts.app')
@section('content')
<h4>Reporters</h4>
<p><a href="{{ route('reporters.create') }}" class="btn btn-primary btn-sm">+ New</a></p>
<table class="table table-striped">
    <thead>
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Room</th><th></th></tr>
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
