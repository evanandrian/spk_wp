<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reportController extends Controller
{
    public function cetakLaporanKriteria(){
        $dataKriteria = DB::table('tb_kriteria as tk')
            ->leftJoin('tb_atribut as ta','ta.id','=','tk.idatribut')
            ->select(DB::raw("tk.*,ta.atribut"))
            ->get();

        $data = array(
            'kriteria' => $dataKriteria,
            'content'   => '',
        );
        return view('report/print_kriteria',$data);
    }

    public function cetakLaporanAlternatif(){
        $data = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.*"))
            ->get();

        $data = array(
            'data' => $data,
            'content'   => '',
        );
        return view('report/print_alternatif',$data);
    }
}
