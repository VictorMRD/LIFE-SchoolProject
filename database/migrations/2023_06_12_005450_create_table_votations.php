<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_votations', function (Blueprint $table) {
            $table->id();
            $table->string("pregunta");
            $table->string("respuesta1");
            $table->string("respuesta2");
            $table->string("respuesta3");
            $table->integer("r1votos");
            $table->integer("r2votos");
            $table->integer("r3votos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_votations');
    }
};
