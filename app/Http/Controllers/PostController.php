<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));

    }

    public function singlepost(Post $post){
        $allpost = Post::all();
        return view('posts.singlepost', [
            'post' => $post,
            'allpost' => $allpost
        ]);
    }

    public function addposts(){
        return view('posts.addposts');
    }

    public function create(Request $request){
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'role' => $request->role,
            'title' => $request->title,
            'content' => $request->content,
            'excerpt' => Str::of(strip_tags($request->content)
            )->limit(90),
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail

        ]);

        return redirect('/posts')->with('sukses', 'Postingan berhasil dibuat');
    }
}
