<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\dashboard\Description;

class DescriptionController extends Controller
{
    //

    public function indexDescriptionFactory($id)
    {
        $descriptions = Description::where('factory_id', $id)->get();
        return view('dashboard.description.index', ['descriptions' => $descriptions, 'nameTable' => 'factories', 'factory_id' =>$id]);
    }

    public function indexDescriptionProduct($id)
    {
        $descriptions = Description::where('product_id', $id)->get();
        return view('dashboard.description.index', ['descriptions' => $descriptions ,'nameTable' => 'products', 'product_id' =>$id]);

    }

    public function createDescriptionFactory($factory_id)
    {

        return view('dashboard.description.create', ['factory_id' => $factory_id ,'nameTable' => 'factories']);
    }

    public function createDescriptionProduct($product_id)
    {
        return view('dashboard.description.create', ['product_id' => $product_id, 'nameTable' => 'products']);
    }

    public function storeDescriptionFactory(Request $request)
    {
        // Validation (adjust the rules as needed)



        // Store the description
        Description::create([
            'title' => $request->title,
            'text' => $request->text,
            'factory_id' => $request->factory_id,
            'product_id' => null,



        ]);

        // Redirect or return a response as needed
        return redirect()->route('descriptions.indexFactory', ['id' => $request->factory_id]);


    }

    public function storeDescriptionProduct(Request $request)
    {
        // Validation (adjust the rules as needed)


        // Store the description
        Description::create([
            'title' => $request->title,
            'text' => $request->text,
            'factory_id' => null,
            'product_id' => $request->product_id,



        ]);
        // Redirect or return a response as needed
        return redirect()->route('descriptions.indexProduct', ['id' => $request->product_id]);

    }

    public function editDescriptionFactory($description_id, $factory_id)
    {
        $description = Description::find($description_id);
        return view('dashboard.description.edit', ['factory_id' => $factory_id,'description' => $description, 'nameTable' => 'factories']);
    }

    public function editDescriptionProduct($id)
    {
        $description = Description::find($id);
        return view('dashboard.description.edit', ['description' => $description, 'nameTable' => 'products']);

    }


    public function updateDescriptionFactory(Request $request, $id)
    {

        $description = Description::findOrFail($id);

        // Update the description
        $description->update([
            'title' => $request->title,
            'text' => $request->text,
            'factory_id' => $request->factory_id,
            'product_id' => null,
        ]);

        dd($description);

        // Redirect or return a response as needed
        return redirect()->route('descriptions.indexFactory', ['id' => $request->factory_id]);
    }

    public function updateDescriptionProduct(Request $request, $id)
    {
        $description = Description::find($id);
        $description->update($request->all());

        return redirect()->route('your.redirect.route');
    }

    public function destroyDescriptionProduct()
    {

    }


    public function destroyDescriptionFactory()
    {

    }



}
