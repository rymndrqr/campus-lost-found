@extends('layouts.app')
@section('content')
<h4 class="mb-4">Record New Claim</h4>
<div class="card">
    <div class="card-body">
        <form action="{{ route('claims.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Lost Item</label>
                <select name="lost_item_id" class="form-select @error('lost_item_id') is-invalid @enderror">
                    <option value="">Choose unclaimed item</option>
                    @foreach($lostItems as $item)
                    <option value="{{ $item->id }}" {{ old('lost_item_id') == $item->id ? 'selected' : '' }}>{{ $item->item_name }} - {{ $item->location_found }}</option>
                    @endforeach
                </select>
                @error('lost_item_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Reporter</label>
                <select name="reporter_id" class="form-select @error('reporter_id') is-invalid @enderror">
                    <option value="">Choose reporter</option>
                    @foreach($reporters as $r)
                    <option value="{{ $r->id }}" {{ old('reporter_id') == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                    @endforeach
                </select>
                @error('reporter_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Claimant Name</label>
                    <input type="text" name="claimant_name" class="form-control @error('claimant_name') is-invalid @enderror" value="{{ old('claimant_name') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="claimant_email" class="form-control @error('claimant_email') is-invalid @enderror" value="{{ old('claimant_email') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="claimant_phone" class="form-control @error('claimant_phone') is-invalid @enderror" value="{{ old('claimant_phone') }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="reported_date" class="form-control" value="{{ old('reported_date', date('Y-m-d')) }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('claims.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection

