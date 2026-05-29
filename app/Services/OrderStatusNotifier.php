<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\Setting;
use App\Notifications\OrderStatusNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderStatusNotifier
{
    protected WhatsAppService $whatsApp;

    public function __construct(WhatsAppService $whatsApp)
    {
        $this->whatsApp = $whatsApp;
    }

    public function notify(Order $order, OrderStatus $oldStatus): void
    {
        $adminEmail = Setting::get('email_sales', 'sales@dennyexpress.co.za');

        try {
            Notification::route('mail', $adminEmail)
                ->notify(new OrderStatusNotification($order));
        } catch (\Exception $e) {
            Log::error('Failed to send order status email', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
        }

        $storeNumber = Setting::get('whatsapp_number', '+27743551336');
        if ($this->whatsApp->isEnabled()) {
            $message = $this->buildWhatsAppMessage($order, $oldStatus);
            $this->whatsApp->send($storeNumber, $message);
        }

        if ($order->billing_email !== $adminEmail) {
            try {
                Notification::route('mail', $order->billing_email)
                    ->notify(new OrderStatusNotification($order));
            } catch (\Exception $e) {
                Log::error('Failed to send customer email', [
                    'order' => $order->order_number,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }

    public function notifyNewOrder(Order $order): void
    {
        $adminEmail = Setting::get('email_sales', 'sales@dennyexpress.co.za');

        try {
            Mail::to($adminEmail)->send(new OrderConfirmationMail($order));
        } catch (\Exception $e) {
            Log::error('Failed to send new order email to admin', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
        }

        $storeNumber = Setting::get('whatsapp_number', '+27743551336');
        if ($this->whatsApp->isEnabled()) {
            $message = $this->buildNewOrderWhatsAppMessage($order);
            $this->whatsApp->send($storeNumber, $message);
        }

        try {
            Mail::to($order->billing_email)->send(new OrderConfirmationMail($order));
        } catch (\Exception $e) {
            Log::error('Failed to send new order email to customer', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function buildWhatsAppMessage(Order $order, OrderStatus $oldStatus): string
    {
        return implode("\n", [
            "🔔 Order Status Update",
            "",
            "Order: {$order->order_number}",
            "Status: {$oldStatus->label()} → {$order->status->label()}",
            "Customer: {$order->billing_name}",
            "Email: {$order->billing_email}",
            "Phone: {$order->billing_phone}",
            "Items: {$order->items->count()}",
            "Total: R" . number_format($order->total, 2),
            "",
            "View order: " . route('checkout.success', $order->order_number),
        ]);
    }

    protected function buildNewOrderWhatsAppMessage(Order $order): string
    {
        return implode("\n", [
            "🛒 New Order Received",
            "",
            "Order: {$order->order_number}",
            "Customer: {$order->billing_name}",
            "Email: {$order->billing_email}",
            "Phone: {$order->billing_phone}",
            "Items: {$order->items->count()}",
            "Total: R" . number_format($order->total, 2),
            "Payment: {$order->payment_method->label()}",
            "",
            "View order: " . route('checkout.success', $order->order_number),
        ]);
    }
}
