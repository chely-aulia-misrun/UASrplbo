<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $table = 'jadwal';
    protected $guarded = ['id'];

    public function pelajaran(){
        return $this->belongsTo(MataPelajaran::class,'mata_pelajaran_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function tahunajaran(){
        return TahunAjaran::find($this->kelas->tahun_ajaran_id);
    }
}
