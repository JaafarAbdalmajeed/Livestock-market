<?php

    namespace App\Http\Controllers\user;

    use App\Models\Cart;
    use Illuminate\Http\Request;
    use App\Models\dashboard\Product;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;

    class CartController extends Controller
    {
        //
        public function index()
        {
            if (Auth::check()) {
                $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
                $total = $this->calculateTotal();
                return view('user.pages.cart', compact('cartItems', 'total'));
            } else {
                return redirect()->route('login'); // or handle non-authenticated users appropriately
            }
        }

        public function addItem(Request $request)
        {
            try {
                $product_id = $request->input('product_id');
                $quantity = $request->input('quantity');
                if(Auth::check())
                {
                    $product_check = Product::where('id', $product_id)->exists();
                    if ($product_check)
                    {
                        if (Cart::where('product_id',$product_id)->where('user_id', Auth::id())->first())
                        {
                            return response()->json(['status' => $product_check." Already Added to cart"]);

                        }
                        else
                        {
                            $cartItem = new Cart();
                            $cartItem->product_id = $product_id;
                            $cartItem->user_id = Auth::id();
                            $cartItem->quantity = $quantity;
                            $cartItem->save();
                            return response()->json(['status' => $product_check." Added to cart"]);
                        }

                    }
                }
                else
                {
                    return response()->json(['status' => 'Login to Continue']);
                }

                return response()->json(['status' => $product_check . " Added to cart"]);
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json(['status' => 'Error adding to cart'], 500);
            }

        }

        public function updateItem(Request $request)
        {
            try {
                if (Auth::check()) {
                    $product_id = $request->input('product_id');
                    $quantity = $request->input('quantity');

                    $cartItem = Cart::where('product_id', $product_id)
                        ->where('user_id', Auth::id())
                        ->first();

                    if ($cartItem) {
                        $cartItem->quantity = $quantity;
                        $cartItem->update();
                        calculateTotal();

                        return response()->json(['status' => 'Quantity updated in the cart']);
                    } else {
                        return response()->json(['status' => 'Product not found in the cart']);
                    }
                } else {
                    return response()->json(['status' => 'Login to Continue']);
                }
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json(['status' => 'Error updating cart'], 500);
            }
        }


    public function deleteItem(Request $request)
    {
        try {
            if (Auth::check()) {
                $product_id = $request->input('product_id');

                $cartItem = Cart::where('product_id', $product_id)
                    ->where('user_id', Auth::id())
                    ->first();

                if ($cartItem) {
                    $cartItem->delete();
                    return response()->json(['status' => 'Product Deleted Successfully']);
                } else {
                    return response()->json(['status' => 'Product not found in the cart']);
                }
            } else {
                return response()->json(['status' => 'Login to Continue']);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'Error deleting from cart'], 500);
        }
    }
        public function calculateTotal()
        {
            $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
            $total = 0;
            foreach($cartItems as $item)
            {
                $total += $item->product->price * $item->quantity;
            }
            return $total;
        }
    }
