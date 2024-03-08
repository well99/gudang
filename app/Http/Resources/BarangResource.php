<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id_barang,
            'nama' => $this->nama_barang,
            'harga' => $this->harga_satuan,
            'jenis' => $this->nama_jenis_barang,
            'gudang' => $this->nama_gudang,
            'foto' => $this->foto,
            'jumlah' => $this->jumlah_barang
        ];
    }
}
