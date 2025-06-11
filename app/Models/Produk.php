<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'u_m_k_m_id',        // Ganti menjadi 'u_m_k_m_id'
        'nama_produk',
        'deskripsi_produk',
        'harga',
        'gambar_produk',
    ];

    // Relasi: Setiap Produk belongs to satu UMKM
    public function umkm()
    {
        return $this->belongsTo(UMKM::class, 'u_m_k_m_id'); // Ganti ke 'u_m_k_m_id'
    }
}

