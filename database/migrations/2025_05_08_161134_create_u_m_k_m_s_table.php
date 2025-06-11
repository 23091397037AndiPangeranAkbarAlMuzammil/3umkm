<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUMKMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Periksa apakah tabel umkms sudah ada
        if (!Schema::hasTable('umkms')) {
            Schema::create('umkms', function (Blueprint $table) {
                $table->id();
                $table->string('nama_usaha');
                $table->text('deskripsi');
                $table->string('alamat');
                $table->string('kontak');
                $table->string('gambar_usaha')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel umkms jika sudah ada
        Schema::dropIfExists('umkms');
    }
}
