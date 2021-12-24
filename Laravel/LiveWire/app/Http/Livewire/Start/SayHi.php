<?php

namespace App\Http\Livewire\Start;

use Livewire\Component;

class SayHi extends Component
{
    public $name;

    protected $listeners  = [
        'refreshAll' => '$refresh',
    ];
    public function mount($name)
    {
        $this->name = $name;
    }


    public function render()
    {
        return view('livewire.start.say-hi');
    }
}
