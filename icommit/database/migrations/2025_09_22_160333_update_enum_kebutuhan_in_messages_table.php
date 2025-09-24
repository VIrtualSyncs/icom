<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Tambahkan nilai baru 'Pesona Prima 8' ke enum
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Informasi GreenVilla Premium',
                'Pesona Prima 8',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");

        // Step 2: Update data lama supaya sesuai nilai baru
        DB::table('messages')
            ->where('kebutuhan', 'Informasi GreenVilla Premium')
            ->update(['kebutuhan' => 'Pesona Prima 8']);

        // Step 3 (opsional): Hapus nilai lama dari enum
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Pesona Prima 8',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        // Rollback: tambahkan nilai lama dulu
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Informasi GreenVilla Premium',
                'Pesona Prima 8',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");

        // Rollback data lama
        DB::table('messages')
            ->where('kebutuhan', 'Pesona Prima 8')
            ->update(['kebutuhan' => 'Informasi GreenVilla Premium']);

        // Rollback enum ke versi awal
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Informasi GreenVilla Premium',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");
    }
};
