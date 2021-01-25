<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function  index($lang)
    {
        \Session::put('locale', $lang);
        return redirect()->back();
    }
}