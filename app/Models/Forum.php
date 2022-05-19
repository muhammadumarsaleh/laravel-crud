<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Forum extends Model
{
    use HasFactory;
    protected $table = 'forum';
    protected $guarded = ['id'];
    use Sluggable;


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function komentar() {
        return $this->hasMany(komentar::class);
    }
}
 