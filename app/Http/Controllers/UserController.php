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
    public function signin()
    {
        $request = [
            'name' => 'root admin',
            'email' => 'root@admin.tech',
            'avatar' => 'assets/img/faces/undraw_profile.svg',
            'password' => bcrypt(12345678),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        User::create($request);

        return redirect()->route('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect()->back()->withInput($request->only('email'))->withError('Les informations d\'identification fournies ne correspondent pas à nos enregistrements.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::find(auth()->user()->id);
        return view('profil', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login')->withSuccess('Deconnection reussi! A la prochaine!');
    }
}
