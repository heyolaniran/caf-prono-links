<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Str; 
use Laravel\Socialite\Facades\Socialite; 
class GoogleLoginController extends Controller
{
    public function redirectToGoogle() : RedirectResponse {
        return Socialite::driver('google')->redirect() ; 
    }

    public function handleGoogleCallback()   {

        $user = Socialite::driver('google')->stateless()->user();
        
        $existingUser = User::where('google_id', $user->id)->first(); 
       
        if(!is_null($existingUser)) {
            auth()->login($existingUser, true); 
            return redirect()->route('dashboard');
        }else {
           return redirect()->route('sign-up'); 
        }
    }
}
