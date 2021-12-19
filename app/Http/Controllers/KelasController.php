<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Pelajaran;
use App\Models\Rapor;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Tingkat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index(){
        $data['data'] = Kelas::all();

        return view('kelas.index',$data);
    }

    public function create(){
        $data['guru'] = Guru::all();
        $data['mp'] = MataPelajaran::all();
        $data['tahunajaran'] = TahunAjaran::all();
        $data['siswa'] = Siswa::all();
        return view('kelas.tambah',$data);
    }

    public function store(Request $request){

        $siswa = [];

        foreach ($request->siswa as $y => $x){
            array_push($siswa,$y);
        }

        $kelas = Kelas::create([
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'tingkat' => $request->tingkat,
            'wali_kelas_id' => $request->wali_kelas_id,
            'nama' => $request->nama,
            'siswa' => $siswa,
        ]);

        foreach ($request->mp as $y => $x){
            Jadwal::create([
                'kelas_id' => $kelas->id,
                'guru_id' => $x,
                'mata_pelajaran_id' => $y,
                'hari' => $request->hari[$y],
                'jam' => $request->jam[$y],
            ]);
        }

        return redirect('/kelas')->with('sukses','Berhasil tambah kelas');
    }

    public function show($id){
        $data['guru'] = Guru::all();
        $data['mp'] = MataPelajaran::all();
        $data['tahunajaran'] = TahunAjaran::all();
        $data['siswa'] = Siswa::all();
        $data['data'] = Kelas::find($id);
        $data['jadwal'] = Jadwal::where('kelas_id',$id)->get();
        return view('kelas.edit',$data);
    }

    public function update($id,Request $request){

        $siswa = [];

        foreach ($request->siswa as $y => $x){
            array_push($siswa,$y);
        }

        $data = Kelas::find($id);
        $data->tahun_ajaran_id = $request->tahun_ajaran_id;
        $data->tingkat = $request->tingkat;
        $data->wali_kelas_id = $request->wali_kelas_id;
        $data->nama = $request->nama;
        $data->siswa = $siswa;
        $data->save();

        $jadwal = Jadwal::where('kelas_id',$data->kelas_id)->get();
        foreach ($jadwal as $x){
            Jadwal::destroy($x->id);
        }

        foreach ($request->mp as $y => $x){
            Jadwal::create([
                'kelas_id' => $data->id,
                'guru_id' => $x,
                'mata_pelajaran_id' => $y,
                'hari' => $request->hari[$y],
                'jam' => $request->jam[$y],
            ]);
        }

        return redirect('/kelas')->with('sukses','Berhasil edit kelas');
    }

    public function destroy($id){
        $jadwal = Jadwal::where('kelas_id',$id)->get();
        foreach ($jadwal as $x){
            Jadwal::destroy($x->id);
        }
        Kelas::destroy($id);
        return redirect('/kelas')->with('sukses','Berhasil hapus kelas');
    }
}
