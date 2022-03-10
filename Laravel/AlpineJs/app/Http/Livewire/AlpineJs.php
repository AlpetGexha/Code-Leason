<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlpineJs extends Component
{
    // get all color on array
    public $colors = [
        'red',
        'green',
        'blue',
        'yellow',
        'black',
        'white',
        'orange',
        'purple',
        'pink',
        'brown',
        'grey',
        'indigo',
        'teal',
        'cyan',
        'lime',
        'lavender',
        'magenta',
        'maroon',
        'navy',
        'olive',
        'periwinkle',
        'plum',
        'salmon',
        'sienna',
        'tan',
        'turquoise',
        'violet',
    ];
    public function render()
    {
        return view('livewire.alpine-js');
    }
}
