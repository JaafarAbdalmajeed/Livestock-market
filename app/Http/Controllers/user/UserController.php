<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.pages.orders.index', compact('orders'));
    }
    public function view($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('user.pages.orders.view', compact('order'));
    }
}
