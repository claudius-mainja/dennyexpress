<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Revenue (Last 30 Days)';

    protected function getData(): array
    {
        $results = Order::where('payment_status', 'completed')
            ->where('created_at', '>=', now()->subDays(30))
            ->select(
                DB::raw("DATE(created_at) as date"),
                DB::raw("SUM(total) as revenue")
            )
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('revenue', 'date');

        $dates = collect();
        $values = collect();

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates->push(now()->subDays($i)->format('d M'));
            $values->push((float) ($results[$date] ?? 0));
        }

        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $values->toArray(),
                ],
            ],
            'labels' => $dates->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
