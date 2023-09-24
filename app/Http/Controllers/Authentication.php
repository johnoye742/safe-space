<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class Authentication extends Controller
{
    //
    public function createAccount(Request $request) {

        $data = $request -> validate([
            'email' => 'email|required|max:500|unique:users',
            'username' => 'required|max:200|unique:users',
            'fullname' => 'required',
            'dob' => 'date|required',
            'pwd' => 'required|min:8',
            'pwd2' => 'required|min:8'
        ]);

        if($data['pwd'] != $data['pwd2']) {
            return redirect()->back()->withErrors(['pwd2' => 'passwords do not match'])->withInput();
        }

        $options = [
            'email' => $data['email'],
            'username' => $data['username'],
            'name' => $data['fullname'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['pwd'])
        ];
        $user = new User($options);
        if($user -> save()) {
            $request -> session() -> flash('status', 'Account Created Successfully!');
            return redirect('/login');
        }

        return redirect() -> back();
    }

    public function login(Request $request) {
        Log::alert('oops');
        $data = $request -> validate([
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);


        if(Auth::attempt($data)) {
            return redirect('/dashboard');
        }

        return redirect() -> back() ->withErrors(['email' => 'Credentials do not match']);
    }

    public function logout() {
        Auth::logout(Auth::user());

        return redirect('/login');
    }
}
