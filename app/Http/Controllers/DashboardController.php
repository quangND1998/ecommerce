<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Order\Entities\Order;
use Modules\Order\Repositories\OrderRepository;


class DashboardController extends Controller
{
    public function index(OrderRepository $orderRepository)
    {
        $order_pending = Order::where('status', 'pending')->count();
        $orders = $orderRepository->groupByOrder(['pending', 'completed', 'decline']);
        $revenue = Order::where('payment_status', 1)->whereMonth('created_at', Carbon::now()->month)->sum('last_price');
     

        return Inertia::render('CartonShop/Dashboard', compact('orders', 'order_pending', 'revenue'));
    }
}
