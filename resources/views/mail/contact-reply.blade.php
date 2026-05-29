<x-mail::message>
# Denny Express

Dear {{ $contact->name }},

## Your Inquiry: {{ $contact->subject }}

**Your message:**
> {{ $contact->message }}

**Our response:**

{{ $contact->admin_reply }}

---

If you have any further questions, please don't hesitate to contact us.

<x-mail::button :url="url('/contact')">
Contact Us Again
</x-mail::button>

Best regards,
<br>
**Denny Express Team**
<br>
sales@dennyexpress.co.za
</x-mail::message>
