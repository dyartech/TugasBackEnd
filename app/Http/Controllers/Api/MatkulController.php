<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Matkul;
class MatkulController extends Controller
{
    public function read(){
        $matkul = Matkul::with(['koneksi'])->get();
        return response()->json([
            'type'=>'Success',
            'data'=>$matkul
        ],200);
    }
    public function cari($id){
        $matkul = Matkul::find($id)->load(['koneksi']);
        return response()->json([
            'type'=>'Success',
            'data'=>$matkul
        ],200);
    }
    public function create(Request $request){
        $matkul = new Matkul;
        $matkul->nama = $request->nama;
        $matkul->sks = $request->sks;
        $matkul->jam = $request->jam;
        $matkul->save();
        $matkul->koneksi()->attach($request->koneksi);
        return response()->json([
            'type'=>'Success',
            'message'=>'Matkul ditambahkan'
        ],201);
    }
    public function update(Request $request,$id){;
        $matkul->nama = $request->nama;
        $matkul->sks = $request->sks;
        $matkul->jam = $request->jam;
        $matkul->save();
        return response()->json([
            'type'=>'Success',
            'message'=>'Matkul diupdate'
        ],201);
    }
    public function delete($id){
        $matkul = Matkul::find($id);
        $matkul->delete();
        return response()->json([
            'type'=>'Success',
            'message'=>'Matkul dihapus'
        ],201);
    }
}
