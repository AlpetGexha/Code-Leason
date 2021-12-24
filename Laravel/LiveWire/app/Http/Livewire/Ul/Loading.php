<?php

namespace App\Http\Livewire\Ul;

use Livewire\Component;

class Loading extends Component
{
    public $count = 0;
    public function checkout()
    {
        $this->count++;
    }

    public function checkout1()
    {
        $this->count++;
    }

    public function checkout2()
    {
        $this->count++;
    }

    public function checkout3()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.ul.loading');
    }
}
