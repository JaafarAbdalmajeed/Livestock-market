<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->type == 'admin' || auth()->user()->type == 'super admin') {
            return view('dashboard.index');
        } else if (auth()->user()->type == 'user') {
            return view('user.index');
        }
        return Redirect::route('user.index');
    }
}
