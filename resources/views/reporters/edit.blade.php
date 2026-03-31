@extends('layouts.app')
@section('content')
<h4 class="mb-4">Edit Reporter</h4>
<div class="card">
    <div class="card-body">
        <form action="{{ route('reporters.update', $reporter) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $reporter->name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $reporter->email) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $reporter->phone) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Dorm</label>
                <input type="text" name="dorm" class="form-control" value="{{ old('dorm', $reporter->dorm) }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('reporters.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection

