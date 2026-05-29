<?php

namespace App\Notifications;

use App\Mail\OrderStatusMail;
use App\Models\Order;
use App\Services\WhatsAppService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via(object $notifiable): array
    {
        $channels = ['mail'];

        if (app(WhatsAppService::class)->isEnabled()) {
            $channels[] = WhatsAppService::class;
        }

        return $channels;
    }

    public function toMail(object $notifiable)
    {
        return (new OrderStatusMail($this->order))
            ->to($notifiable->email);
    }

    public function toWhatsApp(object $notifiable): string
    {
        $order = $this->order;
        $lines = [
            "Denny Express - Order Update",
            "",
            "Order: {$order->order_number}",
            "Status: {$order->status->label()}",
            "",
            "Items: {$order->items->count()}",
            "Total: R" . number_format($order->total, 2),
        ];

        if ($order->tracking_number) {
            $lines[] = "Tracking: {$order->tracking_number}";
        }

        $lines[] = "";
        $lines[] = "Thank you for choosing Denny Express!";

        return implode("\n", $lines);
    }
}
