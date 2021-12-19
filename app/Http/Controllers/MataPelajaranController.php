<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index(){
        $data['data'] = MataPelajaran::all();
        $data['kurikulum'] = Kurikulum::all();
        return view('matapelajaran.index',$data);
    }

    public function store(Request $request){
        MataPelajaran::create([
            'nama' => $request->nama,
            'kkm' => $request->kkm,
            'kurikulum_id' => $request->kurikulum_id,
        ]);
        return response('sukses');
    }

    public function show($id){
        $data['data'] = MataPelajaran::find($id);
        return response($data);
    }

    public function update($id,Request $request){
        $data = $id::find($id);
        $data->nama = $request->nama;
        $data->kkm = $request->kkm;
        $data->kurikulum_id = $request->kurikulum_id;
        $data->save();
        return response('sukses');
    }

    public function destroy($id){
        MataPelajaran::destroy($id);
        return response('sukses');
    }
}
