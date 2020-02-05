<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prodi;

class ProdiController extends Controller
{
    public function read(){
        $prodi = Prodi::with(['mahasiswa'])->get();
        return response()->json([
            'type'=>'Success',
            'data'=>$prodi
        ],200);
    }
    public function cari($id){
        $prodi = Prodi::find($id)->load(['mahasiswa']);
        return response()->json([
            'type'=>'Success',
            'data'=>$prodi
        ],200);
    }
    public function create(Request $request){
        $prodi = new Prodi;
        $prodi->nama = $request->nama;
        $prodi->akreditasi = $request->akreditasi;
        $prodi->mhs_id = $request->mhs_id;
        $prodi->save();
        return response()->json([
            'type'=>'Success',
            'message'=>'Prodi ditambahkan'
        ],201);
    }
    public function update(Request $request,$id){;
        $prodi = Prodi::find($id);
        $prodi->nama = $request->nama;
        $prodi->akreditasi = $request->akreditasi;
        $prodi->save();
        return response()->json([
            'type'=>'Success',
            'message'=>'Prodi diupdate'
        ],201);
    }
    public function delete($id){
        $prodi = Prodi::find($id);
        $prodi->delete();
        return response()->json([
            'type'=>'Success',
            'message'=>'Prodi dihapus'
        ],201);
    }
}
