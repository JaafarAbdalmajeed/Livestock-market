<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\dashboard\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.pages.products', ['products' => $products]);
    }
}
