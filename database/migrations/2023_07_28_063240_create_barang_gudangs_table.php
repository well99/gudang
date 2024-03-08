<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_gudangs', function (Blueprint $table) {
            $table->id('id_barang');
            $table->foreignId('id_gudang');
            $table->foreignId('jenis_barang');
            $table->string('nama_barang', 100);
            $table->string('harga_satuan', 100);
            $table->integer('jumlah_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_gudangs');
    }
};
