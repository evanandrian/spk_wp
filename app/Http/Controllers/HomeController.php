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
        $dataAlter = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.*"))
            ->get();

        $data = array(
            'alternatif' => $dataAlter,
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
            'content'   => 'transaksi/tr_alternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function update_alternatif(Request $request)
    {
        $data = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.*"))
            ->where('tk.id', $request['id'])
            ->first();

        $data = array(
            'data' => $data,
            'content'   => 'transaksi/up_alternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function tambah_nilaialternatif()
    {
        $alternatif = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.id,tk.alternatif"))
            ->get();

        $data = array(
            'alternatif' => $alternatif,
            'content'   => 'transaksi/tr_nilaialternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function update_nilaialternatif(Request $request)
    {
        $alternatif = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.id,tk.alternatif"))
            ->get();

        $data = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.*"))
            ->where('tk.id', $request['id'])
            ->first();

        $data = array(
            'alternatif' => $alternatif,
            'data' => $data,
            'content'   => 'transaksi/tr_nilaialternatif',
        );
        return view('layout/wrapper',$data);
    }
}
