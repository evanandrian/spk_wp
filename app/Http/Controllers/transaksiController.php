<?php

namespace App\Http\Controllers;

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
            $dataKriteria = $dataKriteria->where('tk.kriteria','ILIKE', '%'.$request['kriteria'].'%');
        }
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
}
