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
        //
        Schema::create('options', function (Blueprint $table){
            $table->id();
            $table->string('Description');
            $table->string('Option1_title');
            $table->string('Option2_title');
            $table->string('Option3_title');
            $table->string('Option1_Action');
            $table->string('Option2_Action');
            $table->string('Option3_Action');
            $table->string('Option1_Description');
            $table->string('Option2_Description');
            $table->string('Option3_Description');
            $table->unsignedBigInteger('Option1_Nextpart')->nullable();
            $table->unsignedBigInteger('Option2_Nextpart')->nullable();
            $table->unsignedBigInteger('Option3_Nextpart')->nullable();
        
            $table->foreign('Option1_Nextpart')->references('id')->on('options');
            $table->foreign('Option2_Nextpart')->references('id')->on('options');
            $table->foreign('Option3_Nextpart')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
