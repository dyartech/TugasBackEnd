<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Mahasiswa extends Model
{
    public function beasiswa(){
        return $this->belongsTo('App\Beasiswa');
    }
    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }
    public function koneksi(){
        return $this->belongsToMany('App\Matkul','koneksi','mhs_id','mat_id');
    }
}