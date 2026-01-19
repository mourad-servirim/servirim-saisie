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
    Schema::create('stocks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('reparation_id')->constrained()->onDelete('cascade');
        $table->string('site');
        $table->string('semaine');
        $table->integer('quantité')->default(0);
        $table->text('remarque')->nullable();
        $table->timestamps();
    });
}


};
