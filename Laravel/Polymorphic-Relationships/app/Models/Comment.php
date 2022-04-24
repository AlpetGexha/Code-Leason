<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['commentable_id', 'commentable_type', 'body'];

    public function commentable()
    {
        $this->morphTo();
    }
}
