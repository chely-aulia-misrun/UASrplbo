<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index(){
        $data['data'] = Sekolah::all()->reverse()->first();
        return view('sekolah.index',$data);
    }

    public function update($id,Request $request){
        Sekolah::destroy($id);
        Sekolah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kepala_sekolah' => $request->kepala_sekolah,
            'nip_kepala_sekolah' => $request->nip_kepala_sekolah,
        ]);
        return response('sukses');
    }
}
