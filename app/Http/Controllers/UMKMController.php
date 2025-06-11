<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UMKM;
use Illuminate\Support\Facades\Storage;

class UMKMController extends Controller
{
    // Menampilkan semua UMKM
    public function index()
    {
        // Mengambil semua data UMKM beserta produk yang terkait
        $umkms = UMKM::with('produks')->get();  // Mengambil UMKM dan relasi produk
        return view('umkm.index', compact('umkms'));
    }

    // Menambahkan data UMKM
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'gambar_usaha' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi gambar
        ]);

        // Variabel untuk menyimpan path gambar
        $gambarUsahaPath = null;

        // Proses unggah gambar jika ada
        if ($request->hasFile('gambar_usaha')) {
            // Menyimpan gambar di folder 'public/images'
            $gambarUsahaPath = $request->file('gambar_usaha')->store('images', 'public'); // Menyimpan di storage/app/public/images
        }

        // Menyimpan data UMKM ke database
        $umkm = UMKM::create([
            'nama_usaha' => $request->nama_usaha,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'gambar_usaha' => $gambarUsahaPath, // Menyimpan path gambar
        ]);

        // Mengembalikan respons JSON dengan data UMKM dan URL gambar
        return response()->json([
            'id' => $umkm->id,
            'nama_usaha' => $umkm->nama_usaha,
            'deskripsi' => $umkm->deskripsi,
            'alamat' => $umkm->alamat,
            'kontak' => $umkm->kontak,
            'gambar_usaha' => $umkm->gambar_usaha,
            'gambar_url' => asset('storage/' . $umkm->gambar_usaha), // Mengembalikan URL gambar
        ], 201);
    }

    // Mengupdate data UMKM berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'gambar_usaha' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi gambar
        ]);

        // Mencari UMKM berdasarkan ID
        $umkm = UMKM::findOrFail($id);

        // Proses unggah gambar baru jika ada
        if ($request->hasFile('gambar_usaha')) {
            // Menghapus gambar lama jika ada
            if ($umkm->gambar_usaha) {
                Storage::disk('public')->delete($umkm->gambar_usaha); // Hapus gambar lama
            }
            // Menyimpan gambar baru
            $gambarUsahaPath = $request->file('gambar_usaha')->store('images', 'public');
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $gambarUsahaPath = $umkm->gambar_usaha;
        }

        // Mengupdate data UMKM
        $umkm->update([
            'nama_usaha' => $request->nama_usaha,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'gambar_usaha' => $gambarUsahaPath, // Mengupdate gambar jika ada
        ]);

        // Mengembalikan respons JSON dengan data UMKM dan URL gambar
        return response()->json([
            'id' => $umkm->id,
            'nama_usaha' => $umkm->nama_usaha,
            'deskripsi' => $umkm->deskripsi,
            'alamat' => $umkm->alamat,
            'kontak' => $umkm->kontak,
            'gambar_usaha' => $umkm->gambar_usaha,
            'gambar_url' => asset('storage/' . $umkm->gambar_usaha), // URL gambar yang diperbarui
        ], 200);
    }

    // Menghapus data UMKM berdasarkan ID
    public function destroy($id)
    {
        // Mencari UMKM berdasarkan ID
        $umkm = UMKM::findOrFail($id);

        // Menghapus gambar jika ada
        if ($umkm->gambar_usaha) {
            Storage::disk('public')->delete($umkm->gambar_usaha); // Hapus gambar dari storage
        }

        // Menghapus UMKM
        $umkm->delete();

        // Mengembalikan respons JSON dengan status 200 (OK)
        return response()->json(['message' => 'UMKM deleted successfully'], 200);
    }

    // Menampilkan detail UMKM berdasarkan ID
    public function show($id)
    {
        // Mencari UMKM berdasarkan ID
        $umkm = UMKM::findOrFail($id);
        return view('umkm.umkm_detail', compact('umkm'));
    }
}
