<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index(){
        $siswa = siswa::all();
        $siswa->map(function($s){
            $s->rataRataNilai = $s->rataNilai();
            return $s;
        });
        $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
        return view('dashboards.index', ['siswa' => $siswa]);
    }
}
