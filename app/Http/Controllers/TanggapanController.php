<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function tanggapan(Request $request) {
        
        $tanggapan = Tanggapan::create([
            'user_id' => auth()->user()->id,
            'konten' => $request->konten
        ]);
        return redirect()->back()->with('sukses', 'Tanggapan anda berhasil dikirim');
    }
}
