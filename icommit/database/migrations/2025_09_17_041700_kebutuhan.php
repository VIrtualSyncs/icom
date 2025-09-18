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
    Schema::create('kebutuhan', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('icon')->nullable(); // bisa simpan nama class icon atau path gambar
        $table->timestamps();
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
