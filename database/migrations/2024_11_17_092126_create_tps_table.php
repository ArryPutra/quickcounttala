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
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_tps');
            $table->foreignId('kecamatan_id')
                ->constrained('kecamatan');
            $table->foreignId('kelurahan_id')
                ->constrained('kelurahan');
            $table->timestamps();

            $table->unique(['nomor_tps', 'kelurahan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tps');
    }
};