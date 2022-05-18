<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Mapel;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// untuk menggunakan helper Str::random atau gunakan |'\Str::random'|
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index(Request $request){

        if($request->has('cari')){
         $data_siswa = siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->paginate(20);
        }else{
            $data_siswa = siswa::all();
        } 
        return view('siswa.index', [
            'data_siswa'=> $data_siswa
        ] );
    }

    public function create(Request $request){
        
        $this->validate( $request, [
            'nama_depan' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:users',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);

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
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function edit(siswa $siswa){
       
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, siswa $siswa){

        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');

    }

    public function delete(siswa $siswa){
        // $siswa = siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');

    }

    public function profile(siswa $siswa){
        $matapelajaran = mapel::all();

        // menyiapkan data chart
        $categories = [];
        $data = [];
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()){
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('siswa.profile',[
        'siswa' => $siswa,
        'matapelajaran' => $matapelajaran,
        'categories' => $categories,
        'data' => $data
    ]);
    }

    public function addnilai(Request $request, siswa $siswa) {
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists()){
            return redirect('siswa/'.$siswa->id.'/profile')->with('error', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$siswa->id.'/profile')->with('sukses', 'Data Nilai Berhasil Diinput');
    }

    public function deletenilai(siswa $siswa, mapel $mapel){
        $siswa->mapel()->detach($mapel->id);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }

    public function getdatasiswa(){
        $siswa = Siswa::all();
        Datatable::eloquent($siswa)->toJson();
    }

    public function profilSaya() {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilsaya', ["siswa" => $siswa]);
    }
    
}