<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->string('item'); // numéro item
            $table->string('designation');
            $table->string('code')->nullable();
            $table->integer('qte_retiree')->default(0);
            $table->integer('qte_restante')->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('stock_items');
    }
};
