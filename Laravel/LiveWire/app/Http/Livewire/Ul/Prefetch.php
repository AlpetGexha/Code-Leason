<?php

namespace App\Http\Livewire\Ul;

use App\Models\todo;
use Livewire\Component;

class Prefetch extends Component
{
    public $todos = [];
    public function loadEmployee()
    {
        // Imagine this is some fairly slow request
        $this->todos = todo::all();
    }
    public function render()
    {
        return view('livewire.ul.prefetch');
    }
}
