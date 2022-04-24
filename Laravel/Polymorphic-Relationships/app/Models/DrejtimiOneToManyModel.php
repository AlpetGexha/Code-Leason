<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrejtimiOneToManyModel extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->morphMany(CategoryOneToMany::class, 'categoryable');
    }
}
