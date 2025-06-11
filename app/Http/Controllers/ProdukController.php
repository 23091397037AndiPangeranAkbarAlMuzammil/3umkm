<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UMKM;

class ProdukController extends Controller
{
    public function show($umkm_id)
    {
        $umkm = UMKM::find($umkm_id);
        $produks = $umkm->produks; // Mendapatkan produk terkait UMKM
        return view('produk.show', compact('umkm', 'produks'));
    }
    
}


