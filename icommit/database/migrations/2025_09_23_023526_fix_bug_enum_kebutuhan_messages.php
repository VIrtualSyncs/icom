<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // =========================
        // Step 1: Tambahkan nilai baru ke enum sementara
        // =========================
        // Tujuannya agar nilai lama tetap diterima sementara data lama diupdate
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Pesona Prima 8',
                'Informasi Pesona Prima 8',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");

        // =========================
        // Step 2: Update semua data lama ke nilai baru
        // =========================
        DB::table('messages')
            ->whereIn('kebutuhan', ['Pesona Prima 8', 'Informasi GreenVilla Premium'])
            ->update(['kebutuhan' => 'Informasi Pesona Prima 8']);

        // =========================
        // Step 3: Hapus nilai lama dari enum (final)
        // =========================
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Informasi Pesona Prima 8',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        // =========================
        // Rollback Step 1: Tambahkan nilai lama kembali
        // =========================
        DB::statement("
            ALTER TABLE messages 
            MODIFY kebutuhan ENUM(
                'Pesona Prima 8',
                'Informasi Pesona Prima 8',
                'Kunjungan Lokasi',
                'Konsultasi KPR',
                'Lainnya'
            ) NOT NULL
        ");

        // =========================
        // Rollback Step 2: Ubah data lama kembali
        // =========================
        DB::table('messages')
            ->where('kebutuhan', 'Informasi Pesona Prima 8')
            ->update(['kebutuhan' => 'Pesona Prima 8']);

        // =========================
        // Rollback Step 3: Kembalikan enum ke versi lama
        // =========================
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
};
