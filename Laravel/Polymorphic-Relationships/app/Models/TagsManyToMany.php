<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsManyToMany extends Model
{
    use HasFactory;

    protected $fillable  = ['name'];

    public function posts()
    {
        return $this->morphedByMany(PostManyToMany::class, 'taggable');
    }

    public function videos()
    {
        return $this->morphedByMany(VideoManyToMany::class, 'taggable');
    }
}
