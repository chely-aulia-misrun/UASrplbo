<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilai extends Model
{
    use SoftDeletes;

    protected $table = 'nilai';
    protected $guarded = ['id'];

    public function pelajaran(){
        return $this->belongsTo(MataPelajaran::class,'mata_pelajaran_id');
    }
}
