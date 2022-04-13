<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use App\Models\Produit;
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
        $fiches = Fiche::where('status', '!=', 'init')->orderBy('created_at')->get();
        return view('fiches.fiches', compact('fiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($fiche = null)
    {
        $produits = [];
        if ($fiche) {
            $fiche = Fiche::find($fiche);
            $produits = Produit::where('fiches_id', $fiche->id)->get();
        } else {
            $fiche = $this->initForm();
        }
        return view('fiches.add', compact('fiche', 'produits'));
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
        $products = Produit::getByFiche($id);
        return view('fiches.fiche-detail', compact('fiche', 'products'));
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
    public function update($id)
    {
        $fiche = Fiche::find($id);
        $fiche->status = 'admin';
        if($fiche->update()) {
            return redirect()->route('fiches.list')->withSuccess('La fiche a été soumis avec succès');
        }
        return redirect()->route('fiche.create', $fiche->id)->withAlert('une erreur s\'est produite, veuillez reessayer!');
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

        if (Fiche::find('FC-' . $code)) {
            $code = rand(10, 10000);
        }
        return 'FC-' . $code;
    }
}
