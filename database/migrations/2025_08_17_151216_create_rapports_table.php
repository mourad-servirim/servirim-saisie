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
    Schema::create('rapports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('semaine');
        $table->timestamp('envoye_le')->nullable();
        $table->string('fichier_pdf')->nullable(); // lien vers le fichier
        $table->timestamps();
    });
}

};
