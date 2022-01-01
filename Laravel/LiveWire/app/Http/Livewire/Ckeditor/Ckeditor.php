<?php

namespace App\Http\Livewire\Ckeditor;

use Livewire\Component;

class Ckeditor extends Component
{
    public $text = 'text';

    public function render()
    {
        return view('livewire.ckeditor.ckeditor');
    }
}
