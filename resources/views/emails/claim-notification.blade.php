@component('mail::message')
# 🔍 New Claim Notification

Dear **{{ $claimRecord->reporter->name }}**,

A new claim has been recorded for an item you reported. Here are the details:

@component('mail::panel')
**Item:** {{ $claimRecord->lostItem->item_name }}
**Location Found:** {{ $claimRecord->lostItem->location_found }}
**Category:** {{ $claimRecord->lostItem->category }}
**Claimant:** {{ $claimRecord->claimant_name }}
**Claimant Phone:** {{ $claimRecord->claimant_phone }}
**Reported Date:** {{ $claimRecord->reported_date->format('F d, Y') }}
@endcomponent

Please coordinate with the claimant to return the item.

@component('mail::button', ['url' => config('app.url') . '/claims', 'color' => 'blue'])
View Claims Dashboard
@endcomponent

Thank you,
**{{ config('app.name') }}**
@endcomponent
