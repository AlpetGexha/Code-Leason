<?php

namespace App\Http\Livewire\Start;

use Livewire\Component;

class Nesting extends Component
{

    public function refreshAll()
    {
        $this->emit('refreshAll');
    }
    public function ez()
    {
        return 'ez';
    }
    public $names = ['Alpet1', 'Alpet2', 'Alpet3', 'Alpet4', 'Alpet5'];
    public function render()
    {
        return view('livewire.start.nesting');
    }
}
