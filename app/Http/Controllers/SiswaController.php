<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// untuk menggunakan helper Str::random atau gunakan |'\Str::random'|
use Illuminate\Support\Str;

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
        // insert ke table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(40);
        $user->save();
        
        // insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = siswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
        $siswa = siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id){

        // $siswa = siswa::find($id)->update($request->all()); 
        $siswa = siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');

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
