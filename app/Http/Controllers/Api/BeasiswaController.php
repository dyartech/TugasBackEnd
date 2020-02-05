<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Beasiswa;

class BeasiswaController extends Controller
{
    public function read(){
        $beasiswa = Beasiswa::get();
        return response()->json([
            'type'=>'Success',
            'data'=>$beasiswa
        ],200);
    }
    public function cari($id){
        $beasiswa = Beasiswa::find($id);
        return response()->json([
            'type'=>'Success',
            'data'=>$beasiswa
        ],200);
    }
    public function create(Request $request){
        $beasiswa = new Beasiswa;
        $beasiswa->nama = $request->nama;
        $beasiswa->dana = $request->dana;
        $beasiswa->save();
        return response()->json([
            'type'=>'Success',
            'message'=>'Beasiswa ditambahkan'
        ],201);
    }
    public function update(Request $request,$id){
        $beasiswa = new Beasiswa;
        $beasiswa->nama = $request->nama;
        $beasiswa->dana = $request->dana;
        $beasiswa->save();
        return response()->json([
            'type'=>'Success',
            'message'=>'Beasiswa diupdate'
        ],201);
    }
    public function delete($id){
        $beasiswa = Beasiswa::find($id);
        $beasiswa->delete();
        return response()->json([
            'type'=>'Success',
            'message'=>'Beasiswa dihapus'
        ],201);
    }
}
