<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail; 
use App\Models\User; 
use App\Mail\OTPMail;
class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('auth.passrecover.forgot-password');
    }

    public function store(Request $request)
    {
       /* if (config('app.is_demo')) {
            return back()->with('error', "You are in a demo version, resetting password is disabled.");
        }*/

        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    /**
     * 
     * Send OTP MAIL 
     */

    public function otp_mail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ], [
            'email.required' => 'Un email est requis', 
            'email.users:exists' => 'Aucun compte dans notre base de client n\'est associé à ce e-mail'
        ]);

        $user = User::where('email', "LIKE", $request->email)->first(); 

        

        $user->update([
            'otp_code' => rand(1211 , 9999), 
        ]) ; 


        Mail::to($user->email)->send(new OTPMail($user)); 

        return redirect()->route('web.otp', ['uid'=> $user->uid]); 


    }

    /**
     * 
     * OTP VIEW
     */

    public function otp_view(string $uid) {

        $user = User::where('uid', $uid)->first(); 
        if(is_null($user)) {
            return redirect()->route('sign-in') ; 
        }
        return view('auth.otp', ['user' => $user]); 
    }


    /**
     * 
     * Verify OTP SUBMITION
     */

     public function otp_verify(Request $request) { 

        $otp = $request->otp_1 . $request->otp_2 . $request->otp_3 . $request->otp_4  ;  

        $request->validate([
            'uid' => 'required|exists:users',
            'otp_1' => 'required'
        ], [
            'uid.required' => 'Vous ne pouvez (mal)heureusement plus aller loin. Nous avons detecté votre action frauduleuse.',
            'otp_1.required'=>  'Votre code OTP est requis'

        ]); 

        $user = User::where('uid', $request->uid)->first() ; 
        
        if($user->otp_code == $otp) {
             
            return redirect()->route('password.reset', ['uid' => $user->uid]); 
        }else {
            //dd($user); 
            return back()->with('message', 'Votre OTP est invalide');
        }

     }

    
}
