<?php
use App\Models\Siswa;
use App\Models\Guru;

function ranking5Besar(){
    $siswa = siswa::all();
        $siswa->map(function($s){
            $s->rataRataNilai = $s->rataNilai();
            return $s;
        });
        $siswa = $siswa->sortByDesc('rataRataNilai')->take(5); 
        return $siswa;
}

function totalSiswa(){
    return siswa::count();
}

function totalGuru(){
    $guru = guru::count();
    return $guru;
}