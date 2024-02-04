<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.order.index', compact('orders'));
    }
    public function orderAddress($id)
    {
        $order = Order::find($id);
        return view('dashboard.order.address-order', compact('order'));
    }
    public function orderItems($id)
    {
        $order = Order::with('orderItems.products')->find($id);
        return view('dashboard.order.items-order', compact('order'));
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return  redirect()->route('orders.index');
    }
}
