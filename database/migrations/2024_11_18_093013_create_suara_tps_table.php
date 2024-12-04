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
        Schema::create('suara_tps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tps_id')
                ->constrained('tps')
                ->onDelete('cascade');
            $table->integer('suara_raza');
            $table->integer('suara_baik');
            $table->json('daftar_gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suara_tps');
    }
};