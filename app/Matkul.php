<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Matkul extends Model
{
    public function koneksi(){
        return $this->BelongsToMany('App\Mahasiswa','koneksi','mat_id','mhs_id');
    }
}
