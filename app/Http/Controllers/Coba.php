<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Coba extends Controller
{
    public function hitung_pajak(Request $request)
    {
        $total = $request->input('total');
        $pajak = $request->input('persen_pajak');

        $net_sales = $total / (1 + ($pajak / 100));
        $pajak_rp = $total - $net_sales;

        $output = [
            'net_sales' => $net_sales,
            'pajak_rp' => $pajak_rp
        ];

        return response()->json($output);
    }

    function hitung_diskon(Request $request)
    {
        $data = $request->json()->all();
        $diskon = $data['discounts'];
        $sebelum_diskon = $data['total_sebelum_diskon'];

        $total_diskon = 0;
        foreach ($diskon as $ds) {
            $dskn = $ds['diskon'];
            $total_diskon += ($dskn / 100) * $sebelum_diskon;
        }

        $setelah_diskon = $sebelum_diskon - $total_diskon;

        $output = [
            "total_diskon" => $total_diskon,
            "total_harga_setelah_diskon" => $setelah_diskon
        ];

        return response()->json($output);
    }

    function share_revenue(Request $request)
    {
        $harga_sebelum = $request->input('harga_sebelum_markup');
        $markup_persen = $request->input('markup_persen');
        $share = $request->input('share_persen');

        $markup = $harga_sebelum * ($markup_persen / 100);
        $setelah_markup = $harga_sebelum + $markup;
        $share_ojol = $setelah_markup * ($share / 100);
        $resto = $setelah_markup - $share_ojol;

        $output = [
            "net_untuk_resto" => $resto,
            "share_untuk_ojol" => $share_ojol,
        ];

        return response()->json($output);
    }
}
