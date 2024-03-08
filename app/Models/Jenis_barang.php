<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jenis_barang';
    protected $guarded = 'id_jenis_barang';
    protected $fillable = ['nama_jenis_barang'];

    function Barang_gudang()
    {
        return $this->hasMany(Barang_gudang::class, 'jenis_barang');
    }
}
