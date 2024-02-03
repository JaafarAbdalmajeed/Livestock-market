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
}
