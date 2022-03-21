<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
         $data_siswa = siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $data_siswa = siswa::all();
        }
        return view('siswa.index', [
            'data_siswa'=> $data_siswa
        ] );
    }

    public function create(Request $request){
        siswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $siswa = siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id){
        $siswa = siswa::find($id)->update($request->all());
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id){
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');

    }
    
}
