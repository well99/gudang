<?php

namespace App\Http\Controllers;

use App\Models\Jenis_barang as ModelsJenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Jenis_barang extends Controller
{
    function index()
    {
        $jenis = new ModelsJenis_barang();
        $data['jenis'] = $jenis->all();
        return view('jenis/index', $data);
    }

    function index_api()
    {
        $jenis = new ModelsJenis_barang();
        $data = $jenis->all();
        return response()->json(['data' => $data]);
    }

    function store(Request $request)
    {
        $data = ['nama_jenis_barang' => $request->nama];
        ModelsJenis_barang::create($data);

        return redirect()
            ->route('jenis.index');
    }

    function edit($id)
    {
        $jenis = new ModelsJenis_barang();
        $data = $jenis->where('id_jenis_barang', $id)->get()->first();
        return $data;
    }

    function update(Request $request)
    {
        DB::table('jenis_barangs')->where('id_jenis_barang', $request->id)->update([
            'nama_jenis_barang' => $request->nama
        ]);
        return redirect()
            ->route('jenis.index');
    }

    function destroy($id)
    {
        DB::table('jenis_barangs')->where('id_jenis_barang', $id)->delete();
        return redirect()
            ->route('jenis.index');
    }
}
