@component('mail::message')
# Thank You for Your Order!

Your order **{{ $order->order_number }}** has been received.

**Order Summary**
- Order Number: {{ $order->order_number }}
- Status: {{ $order->status->label() }}
- Total: R{{ number_format($order->total, 2) }}
- Payment Method: {{ $order->payment_method->label() ?? $order->payment_method }}

@if($order->items->count())
**Items**

@foreach($order->items as $item)
- {{ $item->product_name }} × {{ $item->quantity }} — R{{ number_format($item->total, 2) }}
@endforeach
@endif

@if($order->payment_method->value === 'bank_transfer')
**Payment Instructions**
Please transfer the total of **R{{ number_format($order->total, 2) }}** to:

- **Bank:** First National Bank
- **Account Name:** Denny Express
- **Account Number:** 62854179623
- **Branch Code:** 250655
- **Reference:** {{ $order->order_number }}

Your order will be processed once the payment reflects in our account.
@endif

@component('mail::button', ['url' => route('checkout.success', $order->order_number)])
View Order
@endcomponent

If you chose a card payment, you will be redirected to our secure payment page to complete the transaction.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
