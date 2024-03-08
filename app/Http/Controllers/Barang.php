<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Models\Barang_gudang;
use App\Models\Gudang;
use App\Models\Jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang extends Controller
{
    function index()
    {
        $barang = new Barang_gudang();
        $data['barang'] = DB::table('barang_gudangs')->join('jenis_barangs', 'jenis_barangs.id_jenis_barang', '=', 'barang_gudangs.jenis_barang')->join('gudangs', 'gudangs.id_gudang', '=', 'barang_gudangs.id_gudang')->get();
        // $data['barang'] =  Barang_gudang::with('gudang')->get();
        // dd($data['barang'][0]->gudang->nama_gudang);
        return view('barang/index', $data);
    }

    function index_api()
    {
        $data = DB::table('barang_gudangs')->join('jenis_barangs', 'jenis_barangs.id_jenis_barang', '=', 'barang_gudangs.jenis_barang')->join('gudangs', 'gudangs.id_gudang', '=', 'barang_gudangs.id_gudang')->get();
        return BarangResource::collection($data);
    }

    function getByKategori_api(Request $request)
    {
        $id_jenis = $request['id_jenis'];
        $data = DB::table('barang_gudangs')->join('jenis_barangs', 'jenis_barangs.id_jenis_barang', '=', 'barang_gudangs.jenis_barang')->join('gudangs', 'gudangs.id_gudang', '=', 'barang_gudangs.id_gudang')->where('jenis_barang', $id_jenis)->get();
        return BarangResource::collection($data);
    }

    function getBarangById_api(Request $request)
    {
        $id_barang = $request['id_barang'];
        $data = DB::table('barang_gudangs')->join('jenis_barangs', 'jenis_barangs.id_jenis_barang', '=', 'barang_gudangs.jenis_barang')->join('gudangs', 'gudangs.id_gudang', '=', 'barang_gudangs.id_gudang')->where('id_barang', $id_barang)->first();
        // return response()->json(['data' => $data]);
        return new BarangResource($data);
    }

    public function create()
    {
        $gudang = new Gudang();
        $jenis = new Jenis_barang();
        $data['gudang'] = $gudang->all();
        $data['jenis'] = $jenis->all();
        return view('barang/form', $data);
    }

    function store(Request $request)
    {
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images/foto_barang'), $imageName);
        // $imagePath = 'images/foto_barang' . $imageName;
        Barang_gudang::create([
            'id_gudang' => $request->gudang,
            'jenis_barang' => $request->jenis_barang,
            'nama_barang' => $request->nama_barang,
            'harga_satuan' => $request->harga,
            'jumlah_barang' => $request->jumlah,
            'foto' => $imageName
        ]);
        return redirect()->route('barang.index');
    }

    function edit($id)
    {
        $barang = new Barang_gudang();
        $gudang = new Gudang();
        $jenis = new Jenis_barang();
        $data['gudang'] = $gudang->all();
        $data['jenis'] = $jenis->all();
        $data['barang'] = $barang->find(['id_gudang' => $id])->first();
        return view('barang/form', $data);
    }

    function update(Request $request)
    {
        $data = [
            'id_gudang' => $request->gudang,
            'jenis_barang' => $request->jenis_barang,
            'nama_barang' => $request->nama_barang,
            'harga_satuan' => $request->harga,
            'jumlah_barang' => $request->jumlah
        ];

        DB::table('barang_gudangs')->where(['id_barang' => $request->id])->update($data);
        return redirect()->route('barang.index');
    }

    function destroy($id)
    {
        DB::table('barang_gudangs')->where(['id_barang' => $id])->delete();
        return redirect()->route('barang.index');
    }
}
