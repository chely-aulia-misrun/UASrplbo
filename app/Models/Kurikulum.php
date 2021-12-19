<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurikulum extends Model
{
    use SoftDeletes;

    protected $table = 'kurikulum';
    protected $guarded = ['id'];

    public function pelajaran(){
        return MataPelajaran::where('kurikulum_id',$this->id)->get();
    }
}
