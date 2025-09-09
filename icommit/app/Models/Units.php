<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $fillable = [
        'tipe',
        'luas_tanah',
        'luas_bangunan',
        'kamar_tidur',
        'kamar_mandi',
        'status'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    // Scope untuk menghitung total rumah
    public function scopeTotalRumah($query)
    {
        return $query->count();
    }

    // Scope untuk menghitung rumah terjual
    public function scopeRumahTerjual($query)
    {
        return $query->where('status', 'terjual')->count();
    }

    // Scope untuk rumah tersedia
    public function scopeRumahTersedia($query)
    {
        return $query->where('status', 'tersedia')->count();
    }

    // Scope untuk rumah booking
    public function scopeRumahBooking($query)
    {
        return $query->where('status', 'booking')->count();
    }

    // Method untuk mendapatkan statistik rumah
    public static function getStats()
    {
        return [
            'total' => self::count(),
            'terjual' => self::where('status', 'terjual')->count(),
            'tersedia' => self::where('status', 'tersedia')->count(),
            'booking' => self::where('status', 'booking')->count(),
        ];
    }
}
