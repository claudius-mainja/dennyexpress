<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Dashboard Overview';

    protected function getStats(): array
    {
        $totalRevenue = Order::where('payment_status', 'completed')
            ->where('status', '!=', 'cancelled')
            ->sum('total');

        $ordersToday = Order::whereDate('created_at', today())->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalCustomers = User::count();

        return [
            Stat::make('Total Revenue', 'R ' . number_format($totalRevenue, 2))
                ->description('All completed orders')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->chartColor('success'),
            Stat::make('Orders Today', $ordersToday)
                ->description($pendingOrders . ' pending')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->chartColor('primary'),
            Stat::make('Total Orders', $totalOrders)
                ->description('All time')
                ->descriptionIcon('heroicon-o-receipt-refund')
                ->chartColor('info'),
            Stat::make('Products', $totalProducts)
                ->description('In catalog')
                ->descriptionIcon('heroicon-o-archive-box')
                ->chartColor('warning'),
            Stat::make('Customers', $totalCustomers)
                ->description('Registered users')
                ->descriptionIcon('heroicon-o-users')
                ->chartColor('gray'),
        ];
    }
}
