<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Prodi extends Model
{
    public function mahasiswa(){
        return $this->hasMany('App\Mahasiswa');
    }
}
