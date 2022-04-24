<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function comments()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }
}
