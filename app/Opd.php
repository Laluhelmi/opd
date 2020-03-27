<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $table = 'opd';

    protected $fillable = ['kode_opd','nama_opd'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function fungsional(){
        return $this->belongsTo(Fungsional::class);
    }

    public function struktural(){
        return $this->belongsTo(Struktural::class);
    }

    public function abk(){
        return $this->belongsTo(Struktural::class);
    }
    
}
