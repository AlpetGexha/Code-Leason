<?php

namespace App\Http\Livewire\Search;

use App\Models\todo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithSorting;   

class Query extends Component
{
    public $search;
    // per te bere search duhet te perdorim queryString nga livewire
    // protected $queryString = ['search'];


    // per pagination perdorim WithPagination
    use WithPagination;

    //per clear string
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        // 'page' => ['except' => 1],
    ];
    // public $todos = ['teknollogji', 'algoritme', 'alpet','gexha','kaluar'];

    public function render()
    {
        return view('livewire.search.query', [
            'todos' => todo::where('name', 'like', '%' . $this->search . '%')
                ->get(),
            // 'todos' => todo::paginate(3) 
        ]);
    }


    public $sortBy = '';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}
