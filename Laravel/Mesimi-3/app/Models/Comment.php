<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'mesazhi',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
