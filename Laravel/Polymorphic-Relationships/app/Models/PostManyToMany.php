<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostManyToMany extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function tags()
    {
        return $this->morphToMany(TagsManyToMany::class, 'taggable');
    }
}
