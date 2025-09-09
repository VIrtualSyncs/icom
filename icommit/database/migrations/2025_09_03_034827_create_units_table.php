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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); // sesuai house_infos.tipe
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
            $table->string('kamar_tidur');
            $table->string('kamar_mandi');
            $table->enum('status', ['tersedia','booking','terjual'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
