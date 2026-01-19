<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
{
    Schema::create('pointages', function (Blueprint $table) {
        $table->id();
        $table->string('technicien'); // nom du technicien
        $table->string('tache')->nullable(); // réparation, montage, démontage
        $table->date('date_pointage'); // date
        $table->time('heure_pointage')->nullable(); // heure (ex : 7H:00)
        $table->boolean('present')->default(true); // présent ou absent
        $table->integer('nb_pneus_repares')->nullable(); // nombre de pneus réparés
        $table->text('observation')->nullable(); // remarques
        $table->text('besoins')->nullable(); // besoins/problèmes
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pointages');
    }
};
