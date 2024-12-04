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
        Schema::create('suara_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->integer('kelurahan_id')->constrained('kelurahan');
            $table->integer('suara_raza');
            $table->integer('suara_baik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suara_kelurahan');
    }
};