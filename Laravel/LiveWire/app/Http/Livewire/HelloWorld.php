<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $surename = 'Gexha';
    public $counts = 0;

    // public $selection = 'PHP';
    public $selection = ['PHP'];
    public $name = 'Alpet';
    public $checkbox = false;

    public $checkAllBox = ['baseketboll'];

    public function resetName($name = 'Alpet')
    {
        $this->name = $name;
    }
    public function Counter()
    {
        $this->counts++;
    }
    public $counts1 = 0;
    public function Counter1()
    {
        $this->counts++;
    }
    public function render()
    {
        return view('livewire.hello-world', [
            'name' => 'Alpet',
        ]);
    }
}
