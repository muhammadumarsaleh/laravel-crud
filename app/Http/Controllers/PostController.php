<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));

    }

    public function singlepost(Post $post){
        return view('posts.singlepost', ['post' => $post]);
    }

    public function addposts(){
        return view('posts.addposts');
    }

    public function create(Request $request){
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);

        return redirect('/posts')->with('sukses', 'Post berhasil di submit');
    }
}
