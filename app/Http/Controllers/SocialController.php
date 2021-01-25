<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
   public function loginVk()
   {
      if (\Auth::id()) {
         return redirect()->back();
      }
      return Socialite::with('vkontakte')->redirect();
   }

   public function responseVk(UserRepository $repository)
   {

      $ownUser = $repository->getBySocialId(
         Socialite::driver('vkontakte')->user(),
         'vk'
      );

      \Auth::login($ownUser);
      return redirect()->route('home');
   }
}
