<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fungsional extends Model
{
    protected $table = 'jabatan_fungsional';

    public function opd(){
        return $this->belongsTo(Opd::class,'kode_opd','kode_opd');
    }

    public function abk(){
        return $this->hasMany('App\Abk','jabatan_fungsional_id');
    }
    
}
