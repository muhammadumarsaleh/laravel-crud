<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $table = "post";
    protected $guarded = ['id'];
    protected $dates = ['created_at'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function thumbnail(){

        // if($this->thumbnail){
        //     return $this->thumbnail;
        // }else {
        //     return asset('no-thumbnail.png');
        // }

        // if(!$this->thumbnail){
        //     return asset('no-thumbnail.png');
        // }
        // return $this->thumbnail;

        return !$this->thumbnail ? asset('no-thumbnail.png') : $this->thumbnail; 
    }
}
