<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Beasiswa extends Model
{
    public function mahasiswa(){
        return $this->belongsTo(['App\Mahasiswa']);
    }
}
