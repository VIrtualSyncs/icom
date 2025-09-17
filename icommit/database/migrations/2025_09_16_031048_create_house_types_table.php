<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('house_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // nama tipe rumah
            $table->string('slug')->unique();           // slug untuk URL
            $table->text('description')->nullable();    // deskripsi
            $table->string('image')->nullable();        // path foto
            $table->unsignedInteger('land_area');       // luas tanah m²
            $table->unsignedInteger('building_area');   // luas bangunan m²
            $table->tinyInteger('bedrooms');            // jumlah kamar tidur
            $table->tinyInteger('bathrooms');           // jumlah kamar mandi
            $table->unsignedBigInteger('price');        // harga (atau decimal jika butuh koma)
            // kalau harga perlu desimal gunakan:
            // $table->decimal('price', 12, 2);

            $table->string('installment_note')->nullable(); // catatan cicilan
            $table->json('facilities')->nullable();         // list fasilitas (array)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('house_types');
    }
};
