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

        if ($user) {
            return redirect()->route('users.list')->withSuccess('Utilisateur ajouté avec success');
        }
        return redirect()->back()->withInput($request->only('email'))->withError('Une erreur s\'est produite, veuillez reessayer');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            return redirect()->back()->withSuccess('L\'utilisateur a été supprimé');
        }
        return redirect()->back()->withError('une erreur s\'est produite, veuillez reessayer!');
    }
}
