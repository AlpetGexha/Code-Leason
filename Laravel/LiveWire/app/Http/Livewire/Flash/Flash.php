<?php

namespace App\Http\Livewire\Flash;

use App\Models\todo;
use Livewire\Component;

class Flash extends Component
{
    public $todo;
    public $name;
    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function update()
    {
        $this->validate();
        todo::create(['name' => $this->name]);
        session()->flash('message', 'Todo updated successfully');
    }

    public function render()
    {
        return view('livewire.flash.flash');
    }
}
