<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'name',
        'action',
    ];
    use HasFactory;
}
