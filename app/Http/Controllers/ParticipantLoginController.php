<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.participant.signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('participant')->attempt($credentials)) {
            return redirect()->intended('/participant/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('participant')->logout();
        return redirect('/participant/login');
    }
}
