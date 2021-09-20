<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('home')->with(['success' => 'User successfully created']);
        };

        return redirect()->route('/login')->with(['success' => 'User successfully created']);
    }

    public function signup(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'username' => 'required|regex:/[0-9a-zA-Z\-]/',
                'type' => 'required',
                'fullname' => 'required',
                'number_phone' => 'required',
            ]
        );
        $data['balance'] = 0;
        $request->validate(['password']);
        $data['password'] = bcrypt($request['password']);
        User::create($data);

        return redirect()->route('login');
    }

}
