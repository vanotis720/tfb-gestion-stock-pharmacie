<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $fiche)
    {
        $request->validate([
            'price' => 'required',
        ]);

        return Facture::create([
            'price' => $request->price,
            'users_id' => $fiche->users_id,
            'fiches_id' => $fiche->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit($fiche_id)
    {
        $facture = Facture::where('fiches_id', $fiche_id)->first();
        $fiche = Fiche::find($fiche_id);
        $products = Produit::getByFiche($fiche->id);
        return view('factures.update', compact('fiche', 'products', 'facture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fiche_id)
    {
        $request->validate([
            'organisation' => 'required|string',
            'date' => 'required|date',
        ]);

        $facture = Facture::where('fiches_id', $fiche_id)->first();

        $facture->organisation = $request->organisation;
        $facture->dateAchat = $request->date;

        if ($facture->update()) {
            return redirect()->route('fiche.action', ['id' => $facture->fiches_id, 'action' => 'solved'])->withSuccess('La mise en stock a été soumis avec succès');
        }
        return redirect()->back()->withAlert('une erreur s\'est produite, veuillez reessayer!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
