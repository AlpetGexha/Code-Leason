<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AplineCount extends Component
{
    public $number = 1;

    public function count(){
        $this->number++;
    }

    public function render()
    {
        return view('livewire.apline-count');
    }
}
