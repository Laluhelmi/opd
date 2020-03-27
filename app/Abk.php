<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abk extends Model
{
    protected $table = 'abk';
    protected $fillable = ['jabatan_fungsional_id','kode_opd','uraian_tugas','satuan_hasil','waktu_penyelesaian','waktu_kerja_efektif','beban_kerja','pegawai_dibutuhkan','keterangan','sub','username'];
    public function opd(){
        return $this->hasOne(Opd::class, 'kode_opd', 'kode_opd');
    }
    public function struktural(){
        return $this->hasOne(struktural::class, 'kode_opd', 'kode_opd');
    }

}
