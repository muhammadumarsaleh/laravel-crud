<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Post;
use App\Models\Tanggapan;
use App\Mail\NotifRegister;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $tanggapan = Tanggapan::all();
        $posts = Post::all();
        $guru = Guru::all();
        return view('sites.home', [
            'posts' => $posts,
            'guru' => $guru,
            'tanggapan' => $tanggapan
        ]);
    }

    public function about(){
        return view('sites.about');
    }

    public function register(){
        return view('sites.register');
    }

    public function postregister(Request $request){
        // input pendaftar sebagai user dulu
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());

        \Mail::to($user->email)->send(new NotifRegister);
        return redirect('/')->with('sukses', 'Pendaftaran Berhasil');
    }

}
