<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Hash;
use Session;

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
        $data = DB::table('tb_alternatif as tk')
            ->select(DB::raw("tk.*"));

        if (isset($request['alternatif']) || $request['alternatif'] != ""){
            $data = $data->where('tk.alternatif','LIKE', '%'.$request['alternatif'].'%');
        }
        $data = $data->orderBy('tk.id');
        $data = $data->get();

        $data = array(
            'alternatif' => $data,
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
        $data = DB::table('tb_nilaialternatif as tk')
            ->join('tb_alternatif as ta','ta.id','=','tk.idalternatif')
            ->select(DB::raw("tk.*,ta.alternatif"));

        if (isset($request['alternatif']) || $request['alternatif'] != ""){
            $data = $data->where('ta.alternatif','LIKE', '%'.$request['alternatif'].'%');
        }

        $data = $data->orderBy('tk.id');
        $data = $data->get();

        $data = array(
            'alternatif' => $data,
            'content'   => 'content/alternatif',
        );
        return view('layout/wrapper',$data);
    }

    public function saveNilai(Request $request)
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

        $data = Alternatif::where('id', $request['id'])->delete();
        if($data){
            Session::flash('success', 'Hapus Berhasil');
            return redirect()->back()->with('success','Hapus Berhasil');
        } else {
            Session::flash('errors', ['' => 'Hapus Gagal']);
            return redirect()->back()->with('errors','Hapus Gagal');
        }
    }
}
