<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class SiteController extends Controller
{
    public function home(){
        $posts = Post::all();
        return view('sites.home', ['posts' => $posts]);
    }

    public function about(){
        return view('sites.about');
    }

    public function register(){
        return view('sites.register');
    }

    public function bocah(){
        return view('sites.bocah');
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

        return redirect('/')->with('sukses', 'Pendaftaran Berhasil');
    }

}
