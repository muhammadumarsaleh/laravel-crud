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
    // INDEX
    public function index(){
        // get data from table post
        $posts = Post::latest()->get();

        // make response JSON
        return response()->json([
            'status' => true,
            'message' => 'List Data Post',
            'data' => $posts
        ], 200);
    }


    // SHOW
    public function show($id){
        // find post by ID
        $post = Post::findOrfail($id);

        // Make response JSON
        return response()->json([
            'status' => true,
            'message' => 'Detail data Post',
            'data' => $post
        ], 200);
    }

    // STORE
    public function store(Request $request){
        //set validator
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

    // response error validation
    if($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }
    // save to database
    $post = Post::create([
        'title' => $request->title,
        'content' => $request->contentn 
    ]);

    // success save to database
    if($post){
        return response()->json([
            'status' => true,
            'message' => 'Post Created',
            'data' => $post
        ], 201);
    }

    // failed save to database
    return response()->json([
        'status' => false,
        'message' => 'Post Failed to Save',
    ], 409);
    
}

// UPDATE
public function update(Request $request, Post $post){
    // set validation
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required'
    ]);

    // response error validation
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }

    // find post by ID
    $post = Post::findOrFails($post->id);

    if($post){
        // update post
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Post Updated',
            'data' => $post
        ], 200);
    }

    // data post not found
    return response()->json([
        'status' => false,
        'message' => 'Post not Found'
    ], 404);
}

    // DESTROY

    public function destroy($id){

        // find post by ID
        $post = Post::findOrFail($id);

        if($post){
            
            // delete post
            $post->delete();

            return response()->json([
                'status' => true,
                'message' => 'Post deleted'
            ], 200);
        }

        // data post not found
        return response()->json([
            'status' => false,
            'message' => 'Post not found'
        ], 404);
    }

}