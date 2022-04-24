<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOneToMany extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'categoryable_id', 'categoryable_type',
    ];

    public function categoryable()
    {
        return $this->morphTo();
    }
}
