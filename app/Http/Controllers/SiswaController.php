<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(){
        $data['data'] = Siswa::all();
        return view('datasiswa.index',$data);
    }

    public function store(Request $request){
        $user = User::create([
            'id_masuk' => $request->nis,
            'nama' => $request->nama,
            'role' => 'Siswa',
            'is_aktif' => 1,
            'password' => Hash::make($request->nis),
        ]);
        Siswa::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'is_aktif' => $request->is_aktif,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);
        return response('sukses');
    }

    public function show($id){
        $data['data'] = Siswa::find($id);
        return response($data);
    }

    public function update($id,Request $request){
        $data = Siswa::find($id);
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->nisn = $request->nisn;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->is_aktif = $request->is_aktif;
        $data->tahun_masuk = $request->tahun_masuk;
        $data->tahun_keluar = $request->tahun_keluar;
        $data->save();

        $user = User::find($data->user_id);
        $user->nama = $request->nama;
        $user->id_masuk = $request->nis;
        $user->save();

        return response('sukses');
    }

    public function destroy($id){
        Siswa::destroy($id);
        return response('sukses');
    }

    public function gantiPass($id,Request $request){
        $siswa = Siswa::find($id);
        $data = User::find($siswa->user_id);
        $data->password = Hash::make($request->password);
        $data->save();
        return response('sukses');

    }
}
