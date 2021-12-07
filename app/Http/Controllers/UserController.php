<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $data = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255|email',
            'number_phone' => 'required|max:11|min:10',
        ]);
        $email = User::where('email', $data['email'])->where('id', '<>', Auth::id())->first();

        /*
        Check isset email,
        if isset return errors
        */
        if (!is_null($email)) {
            return back()->withErrors(['email' => 'Email is already used'])->withInput();
        }

        $username = User::where('username', $data['username'])->where('id', '<>', Auth::id())->first();

        /*
        Check isset username,
        if isset return errors
        */
        if (!is_null($username)) {
            return back()->withErrors(['username' => 'Username is already used'])->withInput();
        }

        $user->update($data);

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
