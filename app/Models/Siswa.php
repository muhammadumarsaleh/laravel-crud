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
}
