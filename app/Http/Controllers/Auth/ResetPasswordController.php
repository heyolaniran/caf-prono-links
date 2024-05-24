<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User; 
class ResetPasswordController extends Controller
{

    public function create(string $uid)
    {
        $user = User::where('uid', $uid)->first() ; 
        if(is_null($user)) {
            return abort(403) ; 
        }
        return view('auth.passrecover.reset-password', ['uid' => $uid]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'uid' => 'required|exists:users',
            'password' => 'required|string|confirmed|min:6',
        ], [
            'uid.required' => 'Action frauduleuse dectectée',
            'password.required' => 'Un mot de passe est requis', 
            'password.min:6' => 'Minimum 6 caractères pour votre mot de passe ', 
            'password.confirmed' => 'Vos mots de passe ne correspondent pas'
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        /*$status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );*/

        $user = User::where('uid',$request->uid)->first(); 

        $user->forceFill([
            'password' =>  Hash::make($request->password), 
            'remember_token' => Str::random(60)
        ])->save(); 

        $user->update([
            'uid' => substr(uniqid(Str::random(8)), 0, 10)
        ]); 

        return redirect()->route('sign-in')->with('pass', 'Votre mot de passe a bien été mis à jour.');


        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
       /* return $status == Password::PASSWORD_RESET
            ? redirect()->route('sign-in')->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);*/
    }
}
