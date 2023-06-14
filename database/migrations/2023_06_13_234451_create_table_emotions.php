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
        Schema::create('table_emotions', function (Blueprint $table) {
            $table->id();
            $table->integer("Ira");
            $table->integer("Disgusto");
            $table->integer("Tristeza");
            $table->integer("Felicidad");
            $table->integer("Sorpresa");
            $table->integer("Miedo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_emotions');
    }
};
