@extends('layouts.app')
@section('content')
<h4 class="mb-4">New Borrow Record</h4>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ route('borrows.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Select Book <span class="text-success">(available only)</span></label>
                <select name="book_id" class="form-select @error('book_id') is-invalid @enderror">
                    <option value="">-- Choose a Book --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} ({{ $book->available_copies }} available)
                        </option>
                    @endforeach
                </select>
                @error('book_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Select Member</label>
                <select name="member_id" class="form-select @error('member_id') is-invalid @enderror">
                    <option value="">-- Choose a Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }} ({{ $member->email }})
                        </option>
                    @endforeach
                </select>
                @error('member_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Borrow Date</label>
                <input type="date" name="borrowed_at" class="form-control" value="{{ old('borrowed_at', date('Y-m-d')) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}">
                @error('due_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Confirm Borrow</button>
            <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection