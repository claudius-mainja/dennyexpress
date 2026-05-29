<x-mail::message>
# New Contact Inquiry

**From:** {{ $contact->name }}
**Email:** {{ $contact->email }}
@if($contact->phone)
**Phone:** {{ $contact->phone }}
@endif
**Subject:** {{ $contact->subject }}

## Message

{{ $contact->message }}

<x-mail::button :url="url('/admin/contacts/' . $contact->id . '/edit')">
View in Admin
</x-mail::button>

<small>Submitted on {{ $contact->created_at->format('d M Y H:i') }}</small>
</x-mail::message>
