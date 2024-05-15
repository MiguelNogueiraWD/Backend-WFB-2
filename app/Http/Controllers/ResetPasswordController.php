<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    function forgetPassword(){
        return view("auth.reset-password");
    }

    function forgetPasswordPost(Request $request){
        $request->validate ([
            'email' => 'required|email|exists',
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.test', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Réinitialisation du mot de passe");
        });

        return redirect()->to(route('forget.password'))->with('success', 'Email envoyé pour rénitialiser votre mot de passe');
    }

    function resetPassword($token){
        return view('auth.new-password', compact('token'));
    }

    function resetPasswordPost(Request $request){

    }
}
