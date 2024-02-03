<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\dashboard\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(Product::where('id', $item->product_id)->where('quantity', $item->quantity)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('user.pages.checkout' , compact('cartItems'));
    }

    public function place_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pin_code = $request->pin_code;
        $order->tracking_no ='jaafar'.rand(1111,9999);
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = 0;



        foreach($cartItems as $item)
        {
            $total += $item->product->price * $item->quantity;
        }
        $order->total_price = $total;
        $order->save();

        foreach($cartItems as $item)
        {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->quantity;
            $product->update();
        }



        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect()->route('user.index')->with('success', 'Order Places Successfully');

    }
}
