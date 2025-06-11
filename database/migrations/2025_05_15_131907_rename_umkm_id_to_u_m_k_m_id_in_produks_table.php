<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUmkmIdToUMKMIdInProduksTable extends Migration
{
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->renameColumn('umkm_id', 'u_m_k_m_id');
        });
    }

    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->renameColumn('u_m_k_m_id', 'umkm_id');
        });
    }
}

