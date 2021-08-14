<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'content'   => 'content/home',
        );
        return view('layout/wrapper',$data);
    }

    public function ubahpassword()
    {
        $data = array(
            'content'   => 'content/ubahpassword',
        );
        return view('layout/wrapper',$data);
    }

    public function tr_kriteria()
    {
        $dataKriteria = DB::table('tb_kriteria as tk')
            ->leftJoin('tb_atribut as ta','ta.id','=','tk.idatribut')
            ->select(DB::raw("tk.*,ta.atribut"))
            ->get();

        $data = array(
            'foo' => "",
            'kriteria' => $dataKriteria,
            'content'   => 'content/kriteria',
        );
        return view('layout/wrapper',$data);
    }

    public function nilaialternatif()
    {
        $data = array(
            'content'   => 'content/nilaialternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function perhitungan()
    {
        $data = array(
            'content'   => 'content/perhitungan',
        );
        return view('layout/wrapper',$data);
    }

    public function tr_alternatif()
    {
        $data = array(
            'content'   => 'content/alternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function tambah_kriteria(){
        $atribut = DB::table('tb_atribut')
            ->select('id','atribut')
            ->get();

        $data = array(
            'atribut' => $atribut,
            'content'   => 'transaksi/tr_kriteria',
        );
        return view('layout/wrapper',$data);
    }

    public function update_kriteria(Request $request)
    {
        $dataKriteria = DB::table('tb_kriteria as tk')
            ->leftJoin('tb_atribut as ta','ta.id','=','tk.idatribut')
            ->select(DB::raw("tk.*,ta.atribut"))
            ->where('tk.id', $request['id'])
            ->first();

        $atribut = DB::table('tb_atribut')
            ->select('id','atribut')
            ->get();

        $data = array(
            'kriteria' => $dataKriteria,
            'atribut' => $atribut,
            'content'   => 'transaksi/up_kriteria',
        );
        return view('layout/wrapper',$data);
    }

    public function tambah_alternatif()
    {
        $data = array(
            'content'   => 'content/alternatif',
        );
        return view('layout/wrapper',$data);
    }
}
