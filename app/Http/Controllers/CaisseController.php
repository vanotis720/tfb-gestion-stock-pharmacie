<?php

namespace App\Http\Controllers;

use App\Models\Recu;
use App\Models\Ordonnance;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordonnances = Ordonnance::where('status', 'caisse')->get();
        return view('recu.attente', compact('ordonnances'));
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
     * @param  \App\Models\Recu  $recu
     * @return \Illuminate\Http\Response
     */
    public function show(Recu $recu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recu  $recu
     * @return \Illuminate\Http\Response
     */
    public function edit(Recu $recu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recu  $recu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recu $recu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recu  $recu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recu $recu)
    {
        //
    }
}
