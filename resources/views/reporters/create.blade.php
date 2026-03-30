@extends('layouts.app')
@section('content')
<h4 class="mb-4">Add New Reporter</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('reporters.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Dorm/Building</label>
                <input type="text" name="dorm" class="form-control" value="{{ old('dorm') }}">
            </div>
            <button type="submit" class="btn btn-primary">Save Reporter</button>
            <a href="{{ route('reporters.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
