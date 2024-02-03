<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\dashboard\Factory;
use App\Models\dashboard\Product;
use App\Models\dashboard\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        $factories = Factory::all();
        return view('dashboard.product.create', compact('product','categories','factories'));
    }

    public function store(Request $request)
{


    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->unit = $request->unit;
    $product->category_id = $request->category_id;
    $product->factory_id = $request->factory_id;
    if($request->hasfile('image'))
        {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . ''. $extension;
            $file->move('uploads/products/', $filename);

        }

        $product->image = $filename;



    $product->save();

    return redirect()->route('products.index');
}

    public function show()
    {

    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $factories = Factory::all();
        return view('dashboard.product.edit', compact('product','categories','factories'));

    }

    public function update(Request $request, string $id)
    {

        $product = Product::find($id);
        $oldImage= $product->image;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        $product->category_id = $request->category_id;
        $product->factory_id = $request->factory_id;
        if($request->hasfile('image'))
        {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . ''. $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }

        $product->save();



        return Redirect::route('products.index');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        // Delete related descriptions first
        $product->descriptions()->delete();

        // Then delete the product
        $product->delete();

        return redirect()->route('products.index');
    }

}
