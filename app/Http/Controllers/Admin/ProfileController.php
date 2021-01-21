<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $user = \Auth::user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $errors = [];
        if ($request->isMethod('post')) {
            $password = $request->post('password');
            if (\Hash::check($request->post('current_password'), $user->password)) {
                if ($this->validate($request, $this->validateRules())) {
                    if (!empty($password)) {
                        $user->password = \Hash::make($password);
                    }
                    $user->name = $request->post('name');
                    $user->email = $request->post('email');

                    $user->save();
                }
            } else {
                $errors['current_password'][] = 'Пароль указан неверно';
            }
            return redirect()->route('admin::profile::update')
                ->withErrors($errors);
        }


        return view('admin.profile.update', ['user' => $user]);
    }


    protected function validateRules()
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'string|min:3',
            'current_password' => 'required',
        ];
    }
}