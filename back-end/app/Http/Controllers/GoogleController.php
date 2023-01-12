<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class GoogleController extends Controller
{
  function redirect(){

  return Socialite::driver('google')->redirect();
  }

   function callbackGoogle(){
       try {
           $google_user= Socialite::driver('google')->user();
          $user = User::where('google_id',$google_user->getId())->first();
          if (! $user) {
            $add_user=User::Create([
                 "name" =>$google_user->getName(),
                 "email"=>$google_user->getEmail(),
                 "google_id"=>$google_user->getId(),
            ]);
            Auth::login($add_user);
            return redirect('dashboard');

          }
          else{
            Auth::login($user);
            return redirect('dashboard');
          }
       } catch (\Throwable $th) {
        //throw $th;
        dd('eruur'.$th->getMessage());
       }
   }
}
