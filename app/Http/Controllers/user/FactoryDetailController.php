<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactoryDetailController extends Controller
{
    //
    public function index(string $id)
    {
        $factory = Factory::with('description')->find($id);
        return view('user.pages.factory-details', compact('factory'));
    }

}
