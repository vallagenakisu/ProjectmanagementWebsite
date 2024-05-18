<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class AuthManager extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('reg');
    }
    function loginPost(Request $request, User $user)
    {
        $request->validate
        (
            [
            'email' => 'required|email',
            'password' => 'required',
            ]
        );
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) 
        {
        $request->session()->regenerate();
            return redirect()->intended(route('getcards', Auth::id()));
        }
        return redirect()->route('login')->with("error" , "Login details are not valid");
    }
    function registrationPost(Request $request)
    {
        $request->validate
        (
            [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'file' => 'required',
            'skills' => 'required|string'
            ]
        );
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] =Hash::make( $request->password);
        $data['file'] = $request->file('file')->store('file','public');
        $data['skills'] = $request->skills;
        $user = User::create($data);
        //dd($data);
        if($user)
        {
            auth()->login($user);
            return redirect()->route('login')->with("success" , "Registration is successful");
        }
        return redirect()->route('registration')->with("error" , "Registration is not successful");
    }
    function logout ()
    {
        $session = session();
        $session->flush();
        Auth::logout();
        return redirect(route('login'));
    }
    
}
