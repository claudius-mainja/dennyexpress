<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function index()
    {
        return view('pages.track-order');
    }

    public function show(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        $order = Order::with('items')
            ->where('order_number', $query)
            ->orWhere('billing_email', $query)
            ->first();

        if (!$order) {
            return redirect()->route('pages.track-order')
                ->with('error', 'No order found with that order number or email address.');
        }

        $timeline = $this->buildTimeline($order);

        return view('pages.track-order', compact('order', 'timeline'));
    }

    protected function buildTimeline(Order $order): array
    {
        $status = $order->status;

        $steps = [
            [
                'title' => 'Order Placed',
                'description' => 'Your order has been received and confirmed',
                'completed' => true,
                'current' => false,
                'date' => $order->created_at->format('M d, Y h:i A'),
            ],
            [
                'title' => 'Processing',
                'description' => 'Your order is being prepared for dispatch',
                'completed' => in_array($status, [
                    OrderStatus::PROCESSING, OrderStatus::SHIPPED,
                    OrderStatus::DELIVERED, OrderStatus::COMPLETED,
                ]),
                'current' => $status === OrderStatus::PROCESSING,
                'date' => null,
            ],
            [
                'title' => 'Shipped',
                'description' => 'Your order has been dispatched and is on its way',
                'completed' => in_array($status, [
                    OrderStatus::SHIPPED, OrderStatus::DELIVERED, OrderStatus::COMPLETED,
                ]),
                'current' => $status === OrderStatus::SHIPPED,
                'date' => null,
            ],
            [
                'title' => 'In Transit',
                'description' => 'Your order is in transit to the delivery address',
                'completed' => in_array($status, [
                    OrderStatus::DELIVERED, OrderStatus::COMPLETED,
                ]),
                'current' => $status === OrderStatus::DELIVERED,
                'date' => null,
            ],
            [
                'title' => 'Delivered',
                'description' => 'Your order has been delivered successfully',
                'completed' => in_array($status, [
                    OrderStatus::DELIVERED, OrderStatus::COMPLETED,
                ]),
                'current' => false,
                'date' => $status === OrderStatus::DELIVERED || $status === OrderStatus::COMPLETED
                    ? $order->updated_at->format('M d, Y h:i A')
                    : null,
            ],
        ];

        return $steps;
    }
}
