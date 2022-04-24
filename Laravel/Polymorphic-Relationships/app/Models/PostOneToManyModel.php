<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostOneToManyModel extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function category()
    {
        return $this->morphMany(CategoryOneToMany::class, 'categoryable');
    }
}
