<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Struktural extends Model
{
   protected $table = 'jabatan_struktural';
   
   public function opd(){
        return $this->belongsTo(Opd::class,'kode_opd','kode_opd');
    }
    public function abk(){
        return $this->belongsTo(abk::class);
    }
}
