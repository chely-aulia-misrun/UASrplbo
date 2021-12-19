<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapor extends Model
{
    use SoftDeletes;

    protected $table = 'rapor';
    protected $guarded = ['id'];
    protected $casts = [
        'eskul' => 'json'
    ];

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class,'tahun_ajaran_id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class,'siswa_id');
    }
}
