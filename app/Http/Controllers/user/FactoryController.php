<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\dashboard\Factory;
use App\Http\Controllers\Controller;

class FactoryController extends Controller
{
    //
    public function index()
    {
        $factories = Factory::all();
        return view('user.pages.factories', ['factories' => $factories]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $factories = Factory::where(function($query) use($search){
            $query->where('name', 'like', '%'.$search.'%');
        })
        ->orWhereHas('category', function($query) use($search){
            $query->where('name', 'like', '%'.$search.'%');
        })
        ->get();

        return view('user.pages.factories', compact('factories', 'search'));
    }
}
