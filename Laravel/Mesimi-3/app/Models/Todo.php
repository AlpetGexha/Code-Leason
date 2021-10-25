<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
#php  artisan tinker - per krijimin  e tabelave ne batabase nerpermjet comadave

# App\Models\ToDo::all() - tregon te gjitha te thenat ne batase
# App\Models\ToDo::create(['title' => 'Shko  ne shkolle']);    
# App\Models\ToDo::find(1)  -per  te qetur tabelen me id


    #fillable nuk mund te ndrushohet
    protected $fillable = [
        'title',
        'completed',
    ] ;
    protected $table = 'todos';
}
