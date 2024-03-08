<?php

namespace App\Http\Controllers;

use App\Models\Barang_gudang;
use App\Models\Jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
{
    // function index()
    // {
    //     $transaksi = Http::get('http://127.0.0.1:8001/api/transaksi');
    //     $responseBody = json_decode($transaksi->getBody(), true);
    //     // $transaksi = 'tes';

    //     dd($responseBody);
    // }
    function index()
    {
        $menu = Jenis_barang::all();
        $barang = Barang_gudang::all();
        // dd(asset('images/foto_barang'));
        $data = [
            'menu' => $menu,
            'barang' => $barang
        ];
        return view('halaman_client', $data);
    }

    function api_index()
    {
        $barang = Barang_gudang::all();
        return response()->json(['data' => $barang]);
    }

    function detail_barang($id)
    {
        $barang = Barang_gudang::where('id_barang', $id)->with('gudang')->get()->first();
        return response()->json(['data' => $barang]);
    }

    function tes($id)
    {
        $barang = Barang_gudang::where('id_barang', $id)->with('gudang')->get()->first();
        return response()->json(['data' => $barang]);
    }
}
