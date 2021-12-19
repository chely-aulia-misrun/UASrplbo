<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'mata_pelajaran';
    protected $guarded = ['id'];

    public function kurikulum(){
        return $this->belongsTo(Kurikulum::class,'kurikulum_id');
    }
}
