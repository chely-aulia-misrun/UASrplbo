<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Sekolah;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index(){
        $data['data'] = TahunAjaran::all();
        $data['kurikulum'] = Kurikulum::all();
        $data['sekolah'] = Sekolah::all()->reverse()->first();
        return view('tahunajaran.index',$data);
    }

    public function store(Request $request){
        $sekolah = Sekolah::all()->reverse()->first();
        TahunAjaran::create([
            'kurikulum_id' => $request->kurikulum_id,
            'tahun_aktif' => $request->tahun_aktif,
            'semester' => $request->semester,
            'tanggal_rapor' => $request->tanggal_rapor,
            'is_aktif' => $request->is_aktif,
            'nama_kepala_sekolah' => $sekolah->kepala_sekolah,
            'nip_kepala_sekolah' => $sekolah->nip_kepala_sekolah,
        ]);
        return response('sukses');
    }

    public function show($id){
        $data['data'] = TahunAjaran::find($id);
        return response($data);
    }

    public function update($id,Request $request){
        $data = TahunAjaran::find($id);
        $data->kurikulum_id = $request->kurikulum_id;
        $data->tahun_aktif = $request->tahun_aktif;
        $data->semester = $request->semester;
        $data->tanggal_rapor = $request->tanggal_rapor;
        $data->is_aktif = $request->is_aktif;
        $data->save();
        return response('sukses');
    }

    public function destroy($id){
        TahunAjaran::destroy($id);
        return response('sukses');
    }
}
