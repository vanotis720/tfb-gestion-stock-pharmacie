<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signin()
    {
        User::create([
            'name' => 'root admin',
            'email' => 'root@admin.tech',
            'avatar' => 'assets/img/faces/undraw_profile.svg',
            'password' => bcrypt(123456789),
        ]);

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

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $user = User::findOrFail(auth()->user()->id);
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();

            return redirect()->back()->withSuccess('Votre profil a été changé avec succès');
        } catch (\Throwable $th) {
            return redirect()->back()->withAlert('une erreur s\'est produite, veuillez reessayer!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login')->withSuccess('Deconnection reussi! A la prochaine!');
    }
}
