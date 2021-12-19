<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    public function index(){
        $data['data'] = Eskul::all();
        return view('eskul.index',$data);
    }

    public function store(Request $request){
        Eskul::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        return response('sukses');
    }

    public function show($id){
        $data['data'] = Eskul::find($id);
        return response($data);
    }

    public function update($id,Request $request){
        $data = Eskul::find($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return response('sukses');
    }

    public function destroy($id){
        Eskul::destroy($id);
        return response('sukses');
    }
}
