<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default.png');
        }

        return asset('images/'.$this->avatar);
    }

    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }

    public function rataNilai(){
        // ambil nilai2
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
        $hitung++;
        }
        if($total > 0 && $hitung > 0){
            return round($total/$hitung);
        } else {
            return 0;
        }
    }

    public function namaLengkap(){
        return $this->nama_depan. ' ' .$this->nama_belakang;
    }
}
