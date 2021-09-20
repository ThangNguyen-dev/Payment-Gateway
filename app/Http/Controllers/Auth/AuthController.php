<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Password_reset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('home')->with(['success' => 'User successfully created']);
        };

        return redirect()->route('login')->with(['success' => 'User successfully created']);
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotpassword()
    {
        return view('auth.forgotpass');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate(
            ['email' => 'required|email']
        );

        $user = User::where('email', $data['email'])->first();
        $passwordReset['email'] = $user->email;
        $passwordReset['token'] = Str::random(50);
        Password_reset::create($passwordReset);

        echo "http://localhost/paymentgateway/setPassword?email={$passwordReset['email']}&token={$passwordReset['token']}";
        return;
    }

    public function setPassword(Request $request)
    {
        $passwordReset = Password_reset::where('token', $request->token)->first();
        $user = User::where('email', $request->email)->first();

        if (is_null($passwordReset) || is_null($user)) {
            return redirect()->route('resetPassword');
        }

        return view('auth.setpassword', ['user' => $user, 'passwordReset' => $passwordReset]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:8|max:50',
                'password_confirm' => 'required|min:8|max:50',
                'token' => 'required',
            ]
        );

        $passwordReset = Password_reset::where('token', $request['token'])->first();

        if (is_null($passwordReset)) {
            return redirect()->route('forgotpass')->with(['alert' => 'Token is invalid']);
        };

        $user = User::where('email', $passwordReset['email'])->first();

        $user->password = bcrypt($request['password']);

        $user->update();
        return redirect()->route('login');
    }
}
