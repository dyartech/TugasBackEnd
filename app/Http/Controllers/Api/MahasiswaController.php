<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function read(){
        $mahasiswa = Mahasiswa::with('prodi','beasiswa','koneksi')->get();
        return response()->json([
            'type'=>'Success',
            'data'=>$mahasiswa
        ],200);
    }
    public function cari($id){
        $mahasiswa = Mahasiswa::find($id)->load('prodi','Beasiswa','koneksi');
        return response()->json([
            'type'=>'Success',
            'data'=>$mahasiswa
        ],200);
    }
    public function create(Request $request){
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nohp = $request->nohp;
        $mahasiswa->beasiswa_id = $request->beasiswa_id;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->save();
        $mahasiswa->koneksi()->attach($request->koneksi);
        return response()->json([
            'type'=>'Success',
            'message'=>'Mahasiswa ditambahkan'
        ],201);
    }
    public function update(Request $request,$id){;
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nohp = $request->nohp;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->beasiswa_id = $request->beasiswa_id;
        $mahasiswa->save();
        return response()->json([
            'type'=>'Success',
            'message'=>'Mahasiswa diupdate'
        ],201);
    }
    public function delete($id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return response()->json([
            'type'=>'Success',
            'message'=>'Mahasiswa dihapus'
        ],201);
    }
}
