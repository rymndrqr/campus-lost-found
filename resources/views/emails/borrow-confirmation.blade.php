@component('mail::message')
# 📚 Book Borrowing Confirmed

Dear **{{ $borrowRecord->member->name }}**,

Your borrowing request has been confirmed. Here are the details:

@component('mail::panel')
**Book Title:** {{ $borrowRecord->book->title }}
**Author:** {{ $borrowRecord->book->author }}
**Borrowed Date:** {{ $borrowRecord->borrowed_at->format('F d, Y') }}
**Due Date:** {{ $borrowRecord->due_date->format('F d, Y') }}
@endcomponent

Please return the book on or before the due date to avoid penalties.

@component('mail::button', ['url' => config('app.url'), 'color' => 'blue'])
Visit Library System
@endcomponent

Thank you,
**{{ config('app.name') }}**
@endcomponent