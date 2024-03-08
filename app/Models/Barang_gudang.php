<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_gudang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    protected $guarded = 'id_barang';
    protected $fillable = ['id_gudang', 'jenis_barang', 'nama_barang', 'harga_satuan', 'jumlah_barang', 'foto'];

    function jenis_barang()
    {
        return $this->belongsTo(Jenis_barang::class, 'jenis_barang', 'id_jenis_barang')->withDefault();
        // return $this->hasMany(Jenis_barang::class, 'id_jenis_barang');
    }

    function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang')->withDefault();
    }
}
