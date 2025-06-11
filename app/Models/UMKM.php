<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkms';

    protected $fillable = [
        'nama_usaha',
        'deskripsi',
        'alamat',
        'kontak',
        'gambar_usaha'
    ];

    protected $appends = ['gambar_url'];

    public function getGambarUrlAttribute()
    {
        return $this->gambar_usaha
            ? asset('storage/' . $this->gambar_usaha)
            : 'https://via.placeholder.com/300x200?text=No+Image';
    }

    // Relasi: Seorang UMKM bisa memiliki banyak Produk
    public function produks()
    {
        return $this->hasMany(Produk::class, 'u_m_k_m_id'); // Ganti ke 'u_m_k_m_id'
    }
}
