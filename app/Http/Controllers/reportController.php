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

    public function cetakLaporanNilaiAlternatif(){

        $datas = DB::table('tb_nilaialternatif as tk')
            ->join('tb_alternatif as ta','ta.id','=','tk.idalternatif')
            ->join('tb_atribut as at','at.id','=','tk.idatribut')
            ->select(DB::raw("tk.*,ta.alternatif,at.atribut"))
            ->get();

        $data = array(
            'data' => $datas,
            'content'   => '',
        );
        return view('report/print_nilaialternatif',$data);
    }

    public function cetakLaporanPerhitungan(){

        $nilaialternatif = DB::table('tb_nilaialternatif as tk')
            ->join('tb_alternatif as ta','ta.id','=','tk.idalternatif')
            ->select(DB::raw("CONCAT(ta.kode,'-',ta.alternatif) AS judul,ta.kode,ta.alternatif,
                                    tk.c1,tk.c2,tk.c3,tk.c4,tk.c5,tk.c6"))
            ->orderBy('ta.id', 'ASC')
            ->get();

        $arrayBobot = collect(DB::select("
            select * from temp_bobot 
        "));

        $bobot=[];
        foreach ($arrayBobot as $item){
            $bobot[] = array(
                'kriteria' => $item->kriteria,
                'nilai1' => round($item->nilai1,4),
                'nilai2' => round($item->nilai2,4),
                'nilai3' => round($item->nilai3,4),
                'nilai4' => round($item->nilai4,4),
                'nilai5' => round($item->nilai5,4),
                'nilai6' => round($item->nilai6,4),
            );
        }

        $dataVektor = collect(DB::select("
            select * from temp_vektor
        "));

        $vektor=[];
        foreach ($dataVektor as $item){
            $vektor[] = array(
                'alternatif' => $item->alternatif,
                'judul' => $item->judul,
                'vektors' => round($item->vektors,4),
                'vektorv' => round($item->vektorv,4)
            );
        }


        $rank = collect(DB::select("
                select judul, vektorv,
                ( select find_in_set( vektorv,
                ( select
                group_concat(distinct vektorv
                order by vektorv DESC)
                from temp_vektor))
                ) as rangking
                from temp_vektor
        "));

        $data = array(
            'bobot' => $bobot,
            'hasilanalisa' => $nilaialternatif,
            'vektor' => $vektor,
            'rank' => $rank,
            'content'   => '',
        );
        return view('report/print_hasil',$data);
    }
}
