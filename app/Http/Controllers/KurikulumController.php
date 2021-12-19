<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index(){
        $data['data'] = Kurikulum::all();
        return view('kurikulum.index',$data);
    }

    public function store(Request $request){
        Kurikulum::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        return response('sukses');
    }

    public function show($id){
        $data['data'] = Kurikulum::find($id);
        return response($data);
    }

    public function update($id,Request $request){
        $data = $id::find($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return response('sukses');
    }

    public function destroy($id){
        Kurikulum::destroy($id);
        return response('sukses');
    }
}
