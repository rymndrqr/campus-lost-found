@extends('layouts.app')
@section('content')
<h4 class="mb-4">Edit Member</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('members.update', $member) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="2">{{ old('address', $member->address) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Member</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection