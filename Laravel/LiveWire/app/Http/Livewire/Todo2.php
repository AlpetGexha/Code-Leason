<?php

namespace App\Http\Livewire;

// setlocale(LC_ALL, 'al');

use App\Models\todo;
use Livewire\Component;
use Livewire\WithPagination;

class Todo2 extends Component
{
    use WithPagination;
    public
        $i = 1,
        $ids,
        $name,
        $action,
        $created_at,
        $search,
        $pagination = 10,
        $page = 1,
        $sortColumnName = 'id',
        $sortColumnAction = 'action',
        $sortDirection = 'desc',
        $sordColumnAction,
        $status = null,
        $selectPage = false,
        $selectAll = false,
        $selectIteams = [];

    protected $paginationTheme = 'bootstrap';

    public $rules = [
        'name' => 'required|min:3|max:255',
    ];

    public $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'page' => ['except' => 1, 'as' => 'p'],
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection' => ['except' => '', 'as' => 'direction'],

    ];

    public function blankFild()
    {
        $this->name = '';
    }

    public function store()
    {
        $this->validate();
        todo::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Todo u krijua me Sukses');
        $this->blankFild();
        $this->emit('addTodo');
    }

    public function edit($id)
    {
        $todo = todo::where('id', $id)->first();
        $this->ids = $todo->id;
        $this->name = $todo->name;
        $this->action = $todo->action;
        $this->created_at = $todo->created_at;
    }

    public function update()
    {
        $this->validate();
        if ($this->id) {
            $todo = todo::find($this->id);
            $todo->update([
                'name' => $this->name,
            ]);
            session()->flash('success', 'Todo u editua me Sukses');
            $this->emit('updateTodo');
        }
    }

    public function completed($id)
    {
        $todos = todo::find($id);
        $todos->action = 1;
        $todos->save();
        session()->flash('success', 'Todo u krye me success');
    }

    public function unCompleted($id)
    {
        $todos = todo::find($id);
        $todos->action = 0;
        $todos->save();
        session()->flash('success', 'Todo nuk u krye ');
    }

    public function delete($id)
    {
        todo::where('id', $id)
            ->first()
            ->delete();
        session()->flash('success', 'Todo u fshi me Sukses');
    }

    public function deleteSelectIteams()
    {
        todo::whereIn('id', $this->selectIteams)
            ->delete();
        $this->selectIteams = [];
        $this->selectAll = false;
    }

    public function sortBy($columnName)
    {
        // dd('here');
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
    }


    // restarto numrin e faqeve kur behet serach
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function filterTodosByStatus($status = null)
    {
        $this->resetPage();

        $this->status = $status;
    }
    public function render()
    {
        $todoCount = todo::count();
        $completedCount = todo::where('action', '1')->count();
        $unCompletedCount = todo::where('action', '0')->count();
        return view('livewire.todo2', [
            'todos' =>  $this->todosDB,
            'todoCount' => $todoCount,
            'completedCount' => $completedCount,
            'unCompletedCount' => $unCompletedCount,
        ]);
    }
    public  $todosDB = todo::where('name', 'like', '%' . $this->search . '%')
        ->when($this->status, function ($query, $status) {
            return $query->where('action', $this->status);
        })
        ->orderBy($this->sortColumnName, $this->sortDirection)
        ->paginate($this->pagination);

    public function updated($validate)
    {
        $this->validateOnly($validate);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->selectIteams = $this->todosDB->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selectIteams = [];
        }
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectIteams = todo::pluck('id');
        } else {
            $this->selectIteams = [];
        }
    }
}
