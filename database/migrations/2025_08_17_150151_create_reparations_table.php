<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reparations', function (Blueprint $table) {
        $table->id();
        $table->string('reference');
        $table->date('date_entree');
        $table->date('date_sortie')->nullable();
        $table->string('type_reparation');
        $table->string('emplatre_rad')->nullable();
        $table->decimal('gomme_mtr', 8, 2)->nullable();
        $table->decimal('verre_dissolut', 8, 2)->nullable();
        $table->string('duree_reparation')->nullable();
        $table->timestamps();
    });
}

};
