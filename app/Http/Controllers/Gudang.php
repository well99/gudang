<?php

namespace App\Http\Controllers;

use App\Models\Gudang as ModelsGudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Gudang extends Controller
{
    function index()
    {
        $gudang = new ModelsGudang();
        $data['gudang'] = $gudang->where('status_gudang', 1)->get();
        // dd($data);
        return view('gudang/index', $data);
    }

    function store(Request $request)
    {
        ModelsGudang::create([
            'nama_gudang' => $request->nama,
            'alamat' => $request->alamat,
            'status_gudang' => 1
        ]);
        return redirect()
            ->route('gudang.index');
    }

    function edit($id)
    {
        $gudang = new ModelsGudang();
        $data = $gudang->where('id_gudang', $id)->get()->first();
        return $data;
    }

    function update(Request $request)
    {
        $data = [
            'nama_gudang' => $request->nama,
            'alamat' => $request->alamat,
            'status_gudang' => 1
        ];
        DB::table('gudangs')->where('id_gudang', $request->id)->update($data);
        return redirect()
            ->route('gudang.index');
    }

    function destroy($id)
    {
        DB::table('gudangs')->where('id_gudang', $id)->delete();
        return redirect('/');
    }
}
