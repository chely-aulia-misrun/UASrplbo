<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class GuruController extends Controller
{
    public function index(){
        $data['data'] = Guru::all();
        return view('guru.index',$data);
    }

    public function store(Request $request){
        $user = User::create([
            'id_masuk' => $request->nip,
            'nama' => $request->nama,
            'role' => 'Non-admin',
            'is_aktif' => 1,
            'password' => Hash::make($request->nip),
        ]);
        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'user_id' => $user->id,
        ]);
        return response('sukses');
    }

    public function show($id){
        $data['data'] = Guru::find($id);
        return response($data);
    }

    public function update($id,Request $request){
        $guru = Guru::find($id);
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->save();
        $data = User::find($guru->user_id);
        $data->nama = $request->nama;
        $data->id_masuk = $request->nip;
        $data->save();
        return response('sukses');
    }

    public function destroy($id){
        $guru = Guru::find($id);
        Guru::destroy($id);
        User::destroy($guru->user_id);
        return response('sukses');
    }

    public function showJadwal(Request $request){
        $data['data'] = Jadwal::where('guru_id',$request->id)->get();
        return response($data);
    }

    public function gantiPass($id,Request $request){
        $guru = Guru::find($id);
        $data = User::find($guru->user_id);
        $data->password = Hash::make($request->password);
        $data->save();
        return response('sukses');

    }
}
