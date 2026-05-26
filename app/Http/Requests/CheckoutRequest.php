<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'billing_name' => ['required', 'string', 'max:255'],
            'billing_email' => ['required', 'email', 'max:255'],
            'billing_phone' => ['required', 'string', 'max:20'],
            'billing_address' => ['required', 'string', 'max:500'],
            'billing_city' => ['required', 'string', 'max:255'],
            'billing_state' => ['nullable', 'string', 'max:255'],
            'billing_zip' => ['nullable', 'string', 'max:20'],
            'billing_country' => ['nullable', 'string', 'max:255'],

            'shipping_same' => ['sometimes', 'boolean'],
            'shipping_name' => ['required_if:shipping_same,false', 'string', 'max:255'],
            'shipping_email' => ['required_if:shipping_same,false', 'email', 'max:255'],
            'shipping_phone' => ['required_if:shipping_same,false', 'string', 'max:20'],
            'shipping_address' => ['required_if:shipping_same,false', 'string', 'max:500'],
            'shipping_city' => ['required_if:shipping_same,false', 'string', 'max:255'],
            'shipping_state' => ['nullable', 'string', 'max:255'],
            'shipping_zip' => ['nullable', 'string', 'max:20'],
            'shipping_country' => ['nullable', 'string', 'max:255'],

            'payment_method' => ['required', 'string', 'in:payfast,ozow,payjustnow,bank_transfer,cod'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'billing_name.required' => 'Please enter your name.',
            'billing_email.required' => 'Please enter your email address.',
            'billing_email.email' => 'Please enter a valid email address.',
            'billing_phone.required' => 'Please enter your phone number.',
            'billing_address.required' => 'Please enter your address.',
            'billing_city.required' => 'Please enter your city.',
            'payment_method.required' => 'Please select a payment method.',
            'payment_method.in' => 'Please select a valid payment method.',
        ];
    }
}
