<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        
        // dd($request->all());
        $siswa = siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');





        // $siswa = siswa::find($id)->update($request->all());
        // if($request->file('avatar')) {
        //     $siswa->avatar = $request->file('avatar')->store('profile');
        // }
        
        // return $request->file('avatar')->store('profile');

        // if($request->hasFile('avatar')){
        //     $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        //     // $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        //     // $siswa->save();
        // }

        // dd($siswa);
        // return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id){
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');

    }

    public function profile($id){
        $siswa = siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
    
}
