<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use Illuminate\Http\Request;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiches = Fiche::where('status','!=', 'init');
        return view('fiches.fiches', compact('fiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // init a fiche

        $fiche = $this->initForm();
        return view('fiches.add', compact('fiche'));
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
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiche = Fiche::find($id);
        return view('fiches.fiche-detail', compact('fiche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function edit(Fiche $fiche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fiche $fiche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiche $fiche)
    {
        //
    }

    private function initForm()
    {
        return Fiche::create([
            'users_id' => auth()->user()->id,
            'status' => 'init',
            'no_fiche' => $this->generateCode(),
        ]);
    }

    private function generateCode()
    {
        $code = rand(10, 10000);

        if(Fiche::find('FC-'.$code)) {
            $code = rand(10, 10000);
        }
        return 'FC-' . $code;
    }
}
