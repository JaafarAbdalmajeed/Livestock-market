<?php

namespace App\Http\Controllers\dashboard;

use App\Models\UploadImage;
use Illuminate\Http\Request;
use App\Models\dashboard\Factory;
use App\Models\dashboard\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $factories = Factory::all();
        return view('dashboard.factory.index', ['factories' => $factories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::all();
        $factory = new Factory();
        return view('dashboard.factory.create', compact('categories','factory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $uploadFile = new UploadFile();

        if($request->hasfile('image'))
        {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . ''. $extension;
            $file->move('uploads/factories/', $filename);

        }

        $data = [
            'name' => $request->name,
            'image' => $filename,
            'category_id' => $request->category_id,
        ];

        $factory = Factory::create($data);

        return redirect()
            ->route('factories.index')
            ->with('success', 'Factory created'
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $factory = Factory::find($id);
        $categories = Category::all();

        return view('dashboard.factory.edit', compact('factory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $factory = Factory::find($id);

        $oldImage = $factory->image;


        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . ''. $extension;
            $file->move('uploads/factories/', $filename);
            $factory->image = $filename;
        }

        $factory->name = $request->name;
        $factory->category_id = $request->category_id;

        $factory->save();

        // $factory->update([
        //     'name' => $request->name,
        //     'category_id' => $request->category_id,
        //     'image' => $filename,
        // ]);
        return Redirect::route('factories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Retrieve the factory with the given ID
    $factory = Factory::find($id);

    // Check if the factory exists
    if (!$factory) {
        return redirect()->route('factories.index')->with('error', 'Factory not found');
    }

    // Capture the image filename
    $image = $factory->image;

    // Delete the factory record
    $factory->delete();

    // Delete the associated image file if it exists
    if ($image && Storage::disk('local')->exists("uploads/factories/{$image}")) {
        Storage::disk('local')->delete("uploads/factories/{$image}");
    }

    return redirect()->route('factories.index')->with('success', 'Item deleted successfully');
}

}
