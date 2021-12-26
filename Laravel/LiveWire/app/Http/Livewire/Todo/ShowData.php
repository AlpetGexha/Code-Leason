<?php

namespace App\Http\Livewire\Todo;

use App\Models\todo;
use Livewire\Component;

class ShowData extends Component
{

    public $todos = [];
    public $i = 1;

    public $search;
    public  $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        // 'page' => ['except' => 1],
    ];

    public  function mount()
    {
        $this->todos = todo::all();
    }

    public function delete($id)
    {
        if ($id) {
            todo::where('id', $id)->first()->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

    public function render()
    {
        return view('livewire.todo.show-data', [
            'todos' => todo::where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
