<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\dashboard\Product;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    //
    public function index(string $id)
    {
        $product = Product::with('descriptions')->find($id);
        return view('user.pages.product-details', compact('product'));
    }
}
