<?php

namespace App\Http\Livewire\Todo;

use App\Models\todo;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class Todos extends Component
{

    public $todos = [];
    public $name;

    public $search;
    public  $page = 1;

    public $i = 1;
    protected $queryString  = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $rules = [
        'name' => 'required|min:3|max:255',
    ];

    public  function mount()
    {
        $this->todos = todo::all();
    }

    public function blankFild()
    {
        $this->name = '';
    }

    public function delete($id)
    {
        if ($id) {
            todo::where('id', $id)->first()->delete();
            session()->flash('success', 'Todo u fshia me Success.');
        }
    }

    public function store()
    {
        $this->validate();
        todo::create(['name' => $this->name]);
        session()->flash('success', 'Todo U krihua me success');
    }



    public function Completed($id)
    {
        $todos = todo::find($id);
        $todos->action = 1;
        $todos->save();
        session()->flash('success', 'Todo u krye me success');
    }

    public function update($id)
    {
        if ($id) {
            $this->validate();
            $todos = todo::find($id);
            $todos->name = $this->name;
            $todos->update(['name' => $this->name]);
            session()->flash('success', 'Todo u editua me success');
        }
    }

    // Live validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    use WithPagination;

    public function render()
    {
        // $this->todos = todo::all();
        return view('livewire.todo.todos', [
            'todos' => todo::where('name', 'like', '%' . $this->search . '%')
                ->paginate(12)
                ->get(),
        ]);
    }
}
