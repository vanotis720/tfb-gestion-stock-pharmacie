<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function create()
    {
        return view('users.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'avatar' => 'assets/img/faces/undraw_profile.svg',
            'password' => bcrypt($request->password),
        ]);

        if($user) {
            return redirect()->route('users.list')->withSuccess('Utilisateur ajouté avec success');
        }
        return redirect()->back()->withInput($request->only('email'))->withError('Une erreur s\'est produite, veuillez reessayer');
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
