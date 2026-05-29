@component('mail::message')
# Order Update — {{ $order->order_number }}

Status: **{{ $order->status->label() }}**

**Order Summary**
- Order Number: {{ $order->order_number }}
- Status: {{ $order->status->label() }}
- Items: {{ $order->items->count() }}
- Total: R{{ number_format($order->total, 2) }}
- Payment Method: {{ $order->payment_method->label() ?? $order->payment_method }}

@if($order->items->count())
**Items**

@foreach($order->items as $item)
- {{ $item->product_name }} × {{ $item->quantity }} — R{{ number_format($item->total, 2) }}
@endforeach
@endif

@if($order->tracking_number)
**Tracking:** {{ $order->tracking_number }}
@endif

@component('mail::button', ['url' => route('checkout.success', $order->order_number)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
