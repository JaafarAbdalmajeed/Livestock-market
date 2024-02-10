<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\dashboard\Factory;
use App\Http\Controllers\Controller;

class FactoryDetailController extends Controller
{
    //
    public function index(string $id)
    {
        $factory = Factory::with('descriptions')->find($id);


        return view('user.pages.factory-details', compact('factory'));
    }

}
