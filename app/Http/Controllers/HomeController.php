<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('pages.home.index');
    }

    public function signup(Request $request)
    {
        return view('pages.participant.signup');
    }

    public function signupPost(Request $request)
    {
        $this->validate($request,[
           "email"=>"required|email|unique:participants,email",
           "name"=>"required",
           "password"=>"required|confirmed",
            "role"=>"required"
        ]);

        $participant = new Participant();
        $participant->email = $request->email;
        $participant->name = $request->name;
        $participant->role = $request->role;
        $participant->password = bcrypt($request->password);
        $participant->save();

        return redirect(route('signin'));
    }

    public function signin(Request $request)
    {
        return view('pages.home.signin');
    }

    public function signinPost(Request $request)
    {
//        return $request;
        $credentials = ["email"=>$request->email,"password"=>$request->password];
        if(Auth::guard("participant")->attempt($credentials,1)){
            return redirect()->intended(route("student.dashboard"));
        }
        return back()->withErrors(['message'=>"invalid credentials"]);
        $this->validate($request,[
           "email"=>"required|email|unique:participants,email",
           "name"=>"required",
           "password"=>"required|confirmed",
            "role"=>"required"
        ]);

        $participant = new Participant();
        $participant->email = $request->email;
        $participant->name = $request->name;
        $participant->role = $request->role;
        $participant->password = bcrypt($request->password);
        $participant->save();

        return back();
    }
}
