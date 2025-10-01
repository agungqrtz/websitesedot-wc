<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nomor_whatsapp',
        'email',
        'alamat_lengkap',
        'jenis_bangunan',
        'jenis_bangunan_lainnya',
        'jenis_layanan',
        'tanggal_pelayanan',
        'metode_pembayaran',
    ];

    // Memberitahu Laravel bahwa kolom ini adalah array
    protected $casts = [
        'jenis_layanan' => 'array',
    ];

    // Relasi: setiap pesanan dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}