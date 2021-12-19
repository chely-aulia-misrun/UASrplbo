<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = 'kelas';
    protected $guarded = ['id'];
    protected $casts = [
        'siswa' => 'json'
    ];

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class,'tahun_ajaran_id');
    }

    public function walikelas(){
        return $this->belongsTo(Guru::class,'wali_kelas_id');
    }

    public function jadwal(){
        return Jadwal::where('kelas_id',$this->id)->get();
    }
}
