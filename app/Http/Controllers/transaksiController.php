<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use App\Models\TempBobot;
use App\Models\TempRanking;
use App\Models\TempVektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Hash;
use Session;
use Webpatser\Uuid\Uuid;

class transaksiController extends Controller
{
    public function getDataKriteria(Request $request)
    {
        $dataKriteria = DB::table('tb_kriteria as tk')
            ->leftJoin('tb_atribut as ta','ta.id','=','tk.idatribut')
            ->select(DB::raw("tk.*,ta.atribut"));

        if (isset($request['kriteria']) || $request['kriteria'] != ""){
            $dataKriteria = $dataKriteria->where('tk.kriteria','LIKE', '%'.$request['kriteria'].'%');
        }
        $dataKriteria = $dataKriteria->orderBy('tk.id');
        $dataKriteria = $dataKriteria->get();

        $data = array(
            'kriteria' => $dataKriteria,
            'content'   => 'content/kriteria',
        );
        return view('layout/wrapper',$data);
    }

    public function saveKriteria(Request $request)
    {
        $rules = [
            'kode'              => 'required',
            'nama'              => 'required',
            'atribut'           => 'required',
        ];

        $messages = [
            'kode.required' => 'Kode wajib diisi',
            'nama.required'     => 'Kriteria wajib diisi',
            'atribut.required'    => 'Atribut wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request['atribut'] == "0"){
            return redirect()->back()->withErrors("Atribut belum dipilih")->withInput($request->all);
        }

        if ($request['id'] == "" || $request['id'] == null){
            $kriteria = new Kriteria();
            $idKriteria = Kriteria::max('id');
            $idKriteria = $idKriteria + 1;
            $kriteria->id = $idKriteria;
        }else{
            $kriteria = Kriteria::where('id', $request['id'])->first();
        }
            $kriteria->kode = $request['kode'];
            $kriteria->kriteria = $request['nama'];
            $kriteria->idatribut = $request['atribut'];
            $simpan = $kriteria->save();

        if($simpan){
            Session::flash('success', 'Simpan Berhasil');
            return redirect()->back()->with('success','Simpan Berhasil');
        } else {
            Session::flash('errors', ['' => 'Simpan Gagal']);
            return redirect()->back()->with('errors','Simpan Gagal');
        }
    }

    public function deleteKriteria(Request $request)
    {
        $rules = [
            'id'              => 'required',
        ];

        $messages = [
            'id.required' => 'Id Tidak Ditemukan',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = Kriteria::where('id', $request['id'])->delete();
        if($data){
            Session::flash('success', 'Hapus Berhasil');
            return redirect()->back()->with('success','Hapus Berhasil');
        } else {
            Session::flash('errors', ['' => 'Hapus Gagal']);
            return redirect()->back()->with('errors','Hapus Gagal');
        }
    }

    public function getDataAlternatif(Request $request)
    {
        $datas = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.*"));

        if (isset($request['alternatif']) || $request['alternatif'] != ""){
            $datas = $datas->where('tk.alternatif','LIKE', '%'.$request['alternatif'].'%');
        }
        $datas = $datas->orderBy('tk.id');
        $datas = $datas->get();

        $data = array(
            'alternatif' => $datas,
            'content'   => 'content/alternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function saveAlternatif(Request $request)
    {
        $rules = [
            'kode'              => 'required',
            'nama'              => 'required',
        ];

        $messages = [
            'kode.required' => 'Kode wajib diisi',
            'nama.required'     => 'Alternatif wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request['id'] == "" || $request['id'] == null){
            $alter = new Alternatif();
            $idalter = Alternatif::max('id');
            $idKriteria = $idalter + 1;
            $alter->id = $idKriteria;
        }else{
            $alter = Alternatif::where('id', $request['id'])->first();
        }
        $alter->kode = $request['kode'];
        $alter->alternatif = $request['nama'];
        if (isset($request['keterangan'])){
            $alter->keterangan = $request['keterangan'];
        }
        $simpan = $alter->save();

        if($simpan){
            Session::flash('success', 'Simpan Berhasil');
            return redirect()->back()->with('success','Simpan Berhasil');
        } else {
            Session::flash('errors', ['' => 'Simpan Gagal']);
            return redirect()->back()->with('errors','Simpan Gagal');
        }
    }

    public function deleteAlternatif(Request $request)
    {
        $rules = [
            'id'              => 'required',
        ];

        $messages = [
            'id.required' => 'Id Tidak Ditemukan',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = Alternatif::where('id', $request['id'])->delete();
        if($data){
            Session::flash('success', 'Hapus Berhasil');
            return redirect()->back()->with('success','Hapus Berhasil');
        } else {
            Session::flash('errors', ['' => 'Hapus Gagal']);
            return redirect()->back()->with('errors','Hapus Gagal');
        }
    }

    public function getDataNilai(Request $request)
    {
        $datas = DB::table('tb_nilaialternatif as tk')
            ->join('tb_alternatif as ta','ta.id','=','tk.idalternatif')
            ->select(DB::raw("tk.*,ta.alternatif"));

        if (isset($request['alternatif']) || $request['alternatif'] != ""){
            $datas = $datas->where('ta.alternatif','LIKE', '%'.$request['alternatif'].'%');
        }

        $datas = $datas->orderBy('tk.id');
        $datas = $datas->get();

        $data = array(
            'data' => $datas,
            'content'   => 'content/nilaialternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function saveNilai(Request $request)
    {
        $rules = [
            'kode'              => 'required',
            'alternatif'        => 'required',
            'c1'                => 'required',
            'c2'                => 'required',
            'c3'                => 'required',
            'c4'                => 'required',
            'c5'                => 'required',
            'c6'                => 'required',
        ];

        $messages = [
            'kode.required' => 'Kode wajib diisi',
            'alternatif.required'     => 'Alternatif wajib diisi',
            'c1.required' => 'Nilai Kriteria 1 wajib diisi',
            'c2.required'     => 'Nilai Kriteria 2 wajib diisi',
            'c3.required' => 'Nilai Kriteria 3 diisi',
            'c4.required'     => 'Nilai Kriteria 4 wajib diisi',
            'c5.required' => 'Nilai Kriteria 5 diisi',
            'c6.required'     => 'Nilai Kriteria 6 wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request['alternatif'] == "0"){
            return redirect()->back()->withErrors("Alternatif belum dipilih")->withInput($request->all);
        }

        if ($request['id'] == "" || $request['id'] == null){
            $nilaialter = new NilaiAlternatif();
            $idalter = NilaiAlternatif::max('id');
            $idKriteria = $idalter + 1;
            $nilaialter->id = $idKriteria;
        }else{
            $nilaialter = NilaiAlternatif::where('id', $request['id'])->first();
        }
            $nilaialter->kode = $request['kode'];
            $nilaialter->idalternatif = $request['alternatif'];
            $nilaialter->c1 = $request['c1'];
            $nilaialter->c2 = $request['c2'];
            $nilaialter->c3 = $request['c3'];
            $nilaialter->c4 = $request['c4'];
            $nilaialter->c5 = $request['c5'];
            $nilaialter->c6 = $request['c6'];
            $simpan = $nilaialter->save();

        if($simpan){
            Session::flash('success', 'Simpan Berhasil');
            return redirect()->back()->with('success','Simpan Berhasil');
        } else {
            Session::flash('errors', ['' => 'Simpan Gagal']);
            return redirect()->back()->with('errors','Simpan Gagal');
        }
    }

    public function deleteNilai(Request $request)
    {
        $rules = [
            'id'              => 'required',
        ];

        $messages = [
            'id.required' => 'Id Tidak Ditemukan',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = NilaiAlternatif::where('id', $request['id'])->delete();
        if($data){
            Session::flash('success', 'Hapus Berhasil');
            return redirect()->back()->with('success','Hapus Berhasil');
        } else {
            Session::flash('errors', ['' => 'Hapus Gagal']);
            return redirect()->back()->with('errors','Hapus Gagal');
        }
    }

    public function hitungHasilSPK(Request $request)
    {
        $TempBobot = DB::statement("delete from temp_bobot");
        $TempVektor = DB::statement("delete from temp_vektor");
        $nilaialternatif = DB::table('tb_nilaialternatif as tk')
            ->join('tb_alternatif as ta','ta.id','=','tk.idalternatif')
            ->select(DB::raw("CONCAT(ta.kode,'-',ta.alternatif) AS judul,ta.kode,ta.alternatif,
                                    tk.c1,tk.c2,tk.c3,tk.c4,tk.c5,tk.c6"))
            ->orderBy('ta.id', 'ASC')
            ->get();
        $wj = 0;
        $wj = $request['c1'] + $request['c2'] + $request['c3'] + $request['c4'] + $request['c5'] + $request['c6'];
        $nilai = 0 - ($request['c1'] / $wj);
        $nbobot[0] = $nilai;
        $nbobot[1] = ($request['c1'] / $wj);
        $nbobot[2] = ($request['c2'] / $wj);
        $nbobot[3] = ($request['c3'] / $wj);
        $nbobot[4] = ($request['c4'] / $wj);
        $nbobot[5] = ($request['c5'] / $wj);
        $nbobot[6] = ($request['c6'] / $wj);


        $totalvektors = 0;
        foreach ($nilaialternatif AS $itm){
            $vektors = pow((float)$itm->c1,(float)$nbobot[0])*pow((float)$itm->c2,(float)$nbobot[2])*pow((float)$itm->c3,(float)$nbobot[3])
                       *pow((float)$itm->c4,(float)$nbobot[4])*pow((float)$itm->c5,(float)$nbobot[5])*pow((float)$itm->c6,(float)$nbobot[6]);
            $totalvektors = $totalvektors + $vektors;
        }

        $dataVektor=[];
        foreach ($nilaialternatif AS $hit){
            $vektors = pow((float)$hit->c1,(float)$nbobot[0])*pow((float)$hit->c2,(float)$nbobot[2])*pow((float)$hit->c3,(float)$nbobot[3])
                       *pow((float)$hit->c4,(float)$nbobot[4])*pow((float)$hit->c5,(float)$nbobot[5])*pow((float)$hit->c6,(float)$nbobot[6]);
            $tot = $vektors/$totalvektors;
            $dataVektor[] = array(
                "alternatif" => $hit->alternatif,
                "judul" => $hit->judul,
                "kriteria" => $hit->alternatif,
                "vektors" => round($vektors,4),
                "vektorv" => round($tot,4),
            );
        }

        $arrayBobot = array(
            [
                "kriteria" => "Kepentingan",
                "kriteria1" => $request['c1'],
                "kriteria2" => $request['c2'],
                "kriteria3" => $request['c3'],
                "kriteria4" => $request['c4'],
                "kriteria5" => $request['c5'],
                "kriteria6" => $request['c6'],
            ],
            [
                "kriteria" => "Bobot",
                "kriteria1" => $nbobot[1],
                "kriteria2" => $nbobot[2],
                "kriteria3" => $nbobot[3],
                "kriteria4" => $nbobot[4],
                "kriteria5" => $nbobot[5],
                "kriteria6" => $nbobot[6],
            ],
            [
                "kriteria" => "Pangkat",
                "kriteria1" => $nbobot[0],
                "kriteria2" => $nbobot[2],
                "kriteria3" => $nbobot[3],
                "kriteria4" => $nbobot[4],
                "kriteria5" => $nbobot[5],
                "kriteria6" => $nbobot[6],
            ]
        );

        $dataBobotInsert = [];
        foreach ($arrayBobot as $item){
            $dataBobotInsert[] = array(
                'id' => substr(Uuid::generate(), 0, 32),
                'kriteria' => $item['kriteria'],
                'nilai1' => $item['kriteria1'],
                'nilai2' => $item['kriteria2'],
                'nilai3' => $item['kriteria3'],
                'nilai4' => $item['kriteria4'],
                'nilai5' => $item['kriteria5'],
                'nilai6' => $item['kriteria6'],
            );
        }

        if (!empty($dataBobotInsert)){
            TempBobot::insert($dataBobotInsert);
            $dataBobotInsert = [];
        }

        $dataVektorInsert = [];
        foreach ($dataVektor as $items){
            $dataVektorInsert[] = array(
                'id' => substr(Uuid::generate(), 0, 32),
                'alternatif' => $items['alternatif'],
                'judul' => $items['judul'],
                'vektors' => $items['vektors'],
                'vektorv' => $items['vektorv'],
            );
        }

        if (!empty($dataVektorInsert)){
            TempVektor::insert($dataVektorInsert);
            $dataVektorInsert = [];
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
            'hasil' => true,
            'bobot' => $arrayBobot,
            'hasilanalisa' => $nilaialternatif,
            'vektor' => $dataVektor,
            'rank' => $rank,
            'content'   => 'content/perhitungan',
        );
        return view('layout/wrapper',$data);
    }

}
