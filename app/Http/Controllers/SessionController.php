<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view("login");
    }

    public function login(Request $request){

        Session::flash('username', $request->username);

        $request -> validate([
            'username'=>'required',
            'password' => 'required'
        ],[
            'username.required' => 'username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
            if(Auth::user()->role == "admin"){
                return redirect('/account');
            }
            if(Auth::user()->role_id == "author"){
                return redirect('/post');
            }
        }

        Session::flash(('message'), ('Login invalid, Username atau Password salah!'));
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
