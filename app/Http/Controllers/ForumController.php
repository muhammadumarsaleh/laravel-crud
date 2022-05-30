<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Komentar;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index() {
        $forum = Forum::orderBy('created_at', 'desc')->paginate(10);
        return view('forum.index', ['forum' => $forum]);
    }

    public function create(Request $request) {
        $request->request->add(['user_id' => auth()->user()->id ]);
        $forum = Forum::create($request->all());
        return redirect()->back()->with('sukses', 'Forum berhasil dibuat');
    }

    public function view(Forum $forum) {
        return view('forum.view', ['forum' => $forum]);
    }

    public function postkomentar(Request $request) {
        $request->request->add(['user_id' => auth()->user()->id]);
        // dd($request->all());
        $komentar = Komentar::create($request->all());
        return redirect()->back()->with('sukses', 'Komentar berhasil ditambahkan');
    }
}
