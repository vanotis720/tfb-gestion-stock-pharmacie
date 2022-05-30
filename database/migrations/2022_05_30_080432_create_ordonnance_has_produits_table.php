<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnanceHasProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnance_has_produits', function (Blueprint $table) {
            $table->id();
            $table->string('dosage');
            $table->double('quantite');
            $table->foreignId('ordonnance_id')->constrained();
            $table->foreignId('produit_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonnance_has_produits');
    }
}
