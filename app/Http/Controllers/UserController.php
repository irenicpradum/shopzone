<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LOGIN
   public function login(Request $req)
{
    $user = User::where(['email' => $req->email])->first();

    if (!$user || !Hash::check($req->password, $user->password)) {
        return back()->with('error', 'Username or password is not matched');
    } else {
        $req->session()->put('user', $user);
        return redirect('/');
    }
}

    // REGISTER
    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User();

        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);

        $user->save();

        return redirect('/login')->with(
            'success',
            'Registration successful! Please login.'
        );
    }


    // LOGOUT
    public function logout(Request $req)
    {
        $req->session()->forget('user');

        return redirect('/login');
    }
}