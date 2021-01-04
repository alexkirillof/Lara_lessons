<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddNewsController extends Controller
{
    public function AddNews()
    {
        return view('AddNews');
    }
    public function Add(Request $request)
    {
        dump($request);
        return Request::capture();
    }
}
