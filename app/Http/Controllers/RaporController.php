<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Rapor;
use App\Models\Sekolah;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class RaporController extends Controller
{
    public function kelas(){
        $guru = Guru::where('user_id',Auth::user()->id)->get()->first();
        $data['data'] = Kelas::where('wali_kelas_id',$guru->id)->get();
        return view('nonadmin.kelas',$data);
    }

    public function kelasInfo($id){
        $kelas = Kelas::find($id);
        $data['data'] = $kelas;
        $data['mulai'] = false;

        $siswa = [];
        foreach ($kelas->siswa as $x){
            array_push($siswa,Siswa::find($x));
        }

        $data['jadwal'] = Jadwal::where('kelas_id',$id)->get();

        if (Carbon::parse($kelas->tahunajaran->tanggal_lapor) <= Carbon::now()){
            if (!Rapor::where('kelas_id',$id)->get()->first()){
                foreach ($kelas->siswa as $x){
                    $rapor = Rapor::create([
                        'siswa_id' => $x,
                        'tahun_ajaran_id' => $kelas->tahun_ajaran_id,
                        'kelas_id' => $kelas->id,
                        'eskul' => [],
                        'sakit' => 0,
                        'izin' => 0,
                        'tanpa_keterangan' => 0,
                    ]);
                    foreach ($data['jadwal'] as $a){
                        Nilai::create([
                            'rapor_id' => $rapor->id,
                            'mata_pelajaran_id' => $a->mata_pelajaran_id
                        ]);
                    }
                }
            }
            $data['mulai'] = true;
        }

        $data['siswa'] = $siswa;
        return view('nonadmin.kelasinfo',$data);
    }

    public function rapor($id,$id2){
        $data['data'] = Rapor::where('kelas_id',$id)->where('siswa_id',$id2)->get()->first();
        $data['eskul'] = Eskul::all();
        return view('nonadmin.rapor',$data);
    }

    public function raporSimpan($id,$id2,Request $request){
        $eskul = [];
        if ($request->has('eskul')){
            foreach ($request->eskul as $x){
                array_push($eskul,$x);
            }
        }
        $data = Rapor::where('kelas_id',$id)->where('siswa_id',$id2)->get()->first();
        $data->predikat_spiritual = $request->predikat_spiritual;
        $data->deskripsi_spiritual = $request->deskripsi_spiritual;
        $data->predikat_sosial = $request->predikat_sosial;
        $data->deskripsi_sosial = $request->deskripsi_sosial;
        $data->eskul = $eskul;
        $data->save();
        return redirect('/nonadmin/kelas/'.$id);
    }

    public function matapelajaran(){
        $guru = Guru::where('user_id',Auth::user()->id)->get()->first();
        $data['data'] = Jadwal::where('guru_id',$guru->id)->get();
        return view('nonadmin.matapelajaran',$data);
    }

    public function matapelajaranInfo($id){
        $jadwal = Jadwal::find($id);
        $kelas = Kelas::find($jadwal->kelas_id);
        $data['data'] = $kelas;
        $data['jadwal'] = $jadwal;
        $data['mulai'] = false;

        if (Carbon::parse($kelas->tahunajaran->tanggal_lapor) <= Carbon::now()){
            $data['mulai'] = true;
        }

        $rapor = Rapor::where('kelas_id',$jadwal->kelas_id)->get();
        foreach ($rapor as $y => $x){
            $nilai = Nilai::where('rapor_id',$x->id)->get()->first();
            $rapor[$y]['nilai'] = $nilai;
        }

        $data['rapor'] = $rapor;

        return view('nonadmin.matapelajaraninfo',$data);
    }

    public function rapornilaiSimpan(Request $request){
        $data = Nilai::find($request->id);
        $data->nilai_pengetahuan = $request->nilai_pengetahuan;
        $data->predikat_pengetahuan = $request->predikat_pengetahuan;
        $data->deskripsi_pengetahuan = $request->deskripsi_pengetahuan;

        $data->nilai_keterampilan = $request->nilai_keterampilan;
        $data->predikat_keterampilan = $request->predikat_keterampilan;
        $data->deskripsi_keterampilan = $request->deskripsi_keterampilan;

        $data->save();
        return redirect()->back()->with('sukses','Sukses isi nilai');
    }

    public function kelasSiswa(){
        $siswa = Siswa::where('user_id',Auth::user()->id)->get()->first();
        $kelas = Kelas::whereJsonContains('siswa',[$siswa->id])->get()->reverse()->first();

        $data['kelas'] = $kelas;

        $siswa = [];
        foreach ($kelas->siswa as $x){
            array_push($siswa,Siswa::find($x));
        }
        $data['siswa'] = $siswa;

        return view('siswa.kelas',$data);
    }

    public function matapelajaranSiswa(){
        $siswa = Siswa::where('user_id',Auth::user()->id)->get()->first();
        $kelas = Kelas::whereJsonContains('siswa',[$siswa->id])->get()->reverse()->first();
        $data['kelas'] = $kelas;
        $mp = Jadwal::where('kelas_id',$kelas->id)->get();
        $data['mp'] = $mp;
        return view('siswa.matapelajaran',$data);
    }

    public function raporSiswa(){
        $siswa = Siswa::where('user_id',Auth::user()->id)->get()->first();
        $data['siswa'] = $siswa;
        $kelas = Kelas::whereJsonContains('siswa',[$siswa->id])->get()->reverse()->first();
        $data['kelas'] = $kelas;
        $rapor = Rapor::where('siswa_id',$siswa->id)->get()->reverse()->first();
        $data['rapor'] = $rapor;
        $nilai = Nilai::where('rapor_id',$rapor->id)->get();
        $data['nilai'] = $nilai;
        $data['sekolah'] = Sekolah::all()->reverse()->first();
        $eskul = [];
        foreach ($rapor->eskul as $x){
            array_push($eskul,Eskul::find($x));
        }
        $data['eskul'] = $eskul;
        return view('siswa.rapor',$data);
    }
}
