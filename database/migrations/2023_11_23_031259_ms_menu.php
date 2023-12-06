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
        Schema::create('ms_menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('food_name');
            $table->integer('price');
            $table->text('description');
            $table->string('pict_food');
            $table->string('category');
            $table->integer('flag');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_menu');
        
    }
};