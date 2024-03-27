<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        return view('auth.login');
    }

    public function loginAction(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect("student");
        } else {
            return redirect('login')->with('message', 'Invalid Email or Password');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerAction(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        User::create($data);
        return redirect('login')->with('message', 'Registration Success');
    }
}
