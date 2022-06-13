<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fiche)
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
        $validatedData = $request->validate([
            'nom' => 'required',
            'categorie' => 'required',
            'condition' => 'required',
            'quantite' => 'required',
            'fiches_id' => 'required',
        ]);
        $produit = Produit::create($validatedData);

        if ($produit) {
            return redirect()->route('fiche.create', $request->fiches_id)->withSuccess('Produit ajouté a la fiche avec success');
        }
        return redirect()->route('fiche.create', $request->fiches_id)->withInput($request->all())->withError('Une erreur s\'est produite, veuillez reessayer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $fiche)
    {
        $produit = Produit::find($id);

        if ($produit->delete()) {
            return redirect()->route('fiche.create', $fiche)->withSuccess('Le produit a été supprimé');
        }
        return redirect()->route('fiche.create', $fiche)->withError('une erreur s\'est produite, veuillez reessayer!');
    }
}
