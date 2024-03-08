<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gudang';
    protected $guarded = ['id_gudang'];

    function barang_gudang()
    {
        return $this->hasMany(Barang_gudang::class);
    }
}
