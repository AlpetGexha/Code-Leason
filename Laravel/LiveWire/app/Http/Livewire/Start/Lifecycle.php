<?php

namespace App\Http\Livewire\Start;

use Illuminate\Http\Request as HttpRequest;
use Livewire\Component;

class Lifecycle extends Component
{
    public $name = 'Alpet';

    // __contraktion on livewire
    // Vetem ne mound lehohet te perdorim Request
    public function mount(HttpRequest $r, $name)
    {
        $this->name = $r->input('name', $name);
    }

    // hydrate lexohet  menjehere pas mount (pasi te fillojm te japim vlerta)
    public function hydrate()
    {
        $this->name = 'Hydrate its here';
    }

    public function updated($name)
    {
        $this->name = strtoupper($name);
    }

    public function render()
    {
        return view('livewire.start.lifecycle');
    }
}
