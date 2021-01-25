<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\EditRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile.update', ['user' => Auth::user()]);
    }

    public function update(EditRequest $request)
    {
        $user = Auth::user();
        $password = $request->post('password');
        if (!empty($password)) {
            $user->password = \Hash::make($password);
        }
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->save();
        return redirect()->route('admin::profile::show');
    }
}