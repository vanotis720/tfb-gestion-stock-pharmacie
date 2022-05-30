<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Models\OrdonnanceHasProduit;
use App\Models\Produit;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
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
    public function create($patient, $id = null)
    {
        if ($id == null) {
            // find ordonnance
            $ordonnance = Ordonnance::create([
                'patient_id' => $patient,
                'datePrescription' => date('Y-m-d'),
            ]);
        } else {
            // init ordonnance
            $ordonnance = Ordonnance::find($id);
        }
        $ordonnance_produits = $ordonnance->produits;

        return view('outputs.ordonnance', compact('patient', 'ordonnance', 'ordonnance_produits'));
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

    public function addProduct(Request $request, $ordonnance)
    {
        $request->validate([
            'produit_id' => 'required',
            'quantite' => 'required',
            'patient_id' => 'required'
        ]);

        OrdonnanceHasProduit::create([
            'produit_id' => $request->produit_id,
            'ordonnance_id' => $ordonnance,
            'quantite' => $request->quantite,
        ]);

        // TODO: remove product quantity to product table total

        return redirect()
            ->route('ordonnance.create', ['id' => $ordonnance, 'patient' => $request->patient_id])
            ->withInfo('Produit ajouter a la commande');
    }

    public function removeProduct($ordonnance, $product)
    {
        $ordonnance = Ordonnance::find($ordonnance);
        $has_product = OrdonnanceHasProduit::where('produit_id', $product)->delete();

        return redirect()
            ->route('ordonnance.create', ['id' => $ordonnance->id, 'patient' => $ordonnance->patient_id])
            ->with('Produit retirer de la commande');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function show(Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordonnance $ordonnance)
    {
        //
    }
}