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

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'like', '%'.$search.'%')
                            ->orWhereHas('category', function($query) use ($search) {
                                $query->where('name', 'like', '%'.$search.'%');
                            })
                            ->orWhereHas('factory', function($query) use ($search) {
                                $query->where('name', 'like', '%'.$search.'%');
                            })
                            ->get();

        return view('user.pages.products', compact('products', 'search'));
    }

}
