<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index(){
        $tahunajaran = TahunAjaran::where('is_aktif',true)->get();
        $siswa = Siswa::where('is_aktif',true)->get();
        $kelas = Siswa::all();
        $mp = MataPelajaran::all();

        $data['tahunajaran'] = $tahunajaran;
        if (Auth::user()->role == 'Admin'){
            $data['siswa'] = $siswa;
            $data['kelas'] = $kelas;
            $data['mp']= $mp;
            return view('beranda.admin',$data);
        }else if (Auth::user()->role == 'Non-admin'){
            $guru = Guru::where('user_id',Auth::user()->id)->get()->first();
            $data['mp'] = Jadwal::where('guru_id',$guru->id)->get();
            $data['kelas'] = Jadwal::where('guru_id',$guru->id)->get()->unique('kelas_id');
            return view('beranda.nonadmin',$data);
        }else{
            $siswa = Siswa::where('user_id',Auth::user()->id)->get()->first();
            $kelas = Kelas::whereJsonContains('siswa',[$siswa->id])->get()->reverse()->first();

            $mp = Jadwal::where('kelas_id',$kelas->id)->get()->count();

            $data['mp'] = $mp;
            return view('beranda.siswa',$data);
        }

    }
}
