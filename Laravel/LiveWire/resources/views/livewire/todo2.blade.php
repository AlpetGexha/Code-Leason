<div>
    @include('livewire.todo.create')
    @include('livewire.todo.update')
    @include('livewire.todo.show')
    <div class="container mt-5 mb-5 p-1">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <p> Live Time Livewire: {{ now() }}</p>
                    <div class="card-header">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="me-auto p-1 bd-highlight">
                                <h3>Todo List</h3>
                            </div>
                            <div class="p-1 bd-highlight">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createTodo">
                                    Krijo Todo
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        {{-- <div class="d-flex justify-content-around"></div> --}}
                        <div class="col-md-12 mt-1 mb-3">
                            <div class="row">
                                <div class="col-md-2 mt-2">
                                    <select wire:model='pagination' class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="150">150</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                    </select>
                                </div>

                                <div class="col-md-7 mt-2">
                                    <div class="btn-group d-flex" role="group" aria-label="Basic outlined example"">
                                        <button wire:click=" filterTodosByStatus" type="button"
                                        class="btn {{ is_null($status) ? 'btn-outline-primary' : 'btn-defaults' }}">
                                        <span class="mr-1">All Task</span>
                                        <span style="color: red;" class="badge badge-pill badge-info">{{ $todoCount
                                            }}</span>
                                        </button>

                                        <button wire:click="filterTodosByStatus('1')" type="button"
                                            class="btn {{ $status === '1' ? 'btn-outline-primary' : 'btn-default' }}">
                                            <span class="mr-1">Completed</span>
                                            <span style="color: red;" class="badge badge-pill badge-primary">{{
                                                $completedCount }}</span>
                                        </button>

                                        <button wire:click.prevent="filterTodosByStatus('false')" type="button"
                                            class="btn {{ $status === '0' ? 'btn-outline-primary' : 'btn-default' }}">
                                            <span class="mr-1">UnCompleted</span>
                                            <span style="color: red;" class="badge badge-pill badge-success">{{
                                                $unCompletedCount }}</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <input wire:model='search' type="search" placeholder="Kerko" class="form-control">
                                </div>
                                {{-- <input type="checkbox" wire:model="selectColums" value="{{ $column }}"> --}}
                                {{-- <label></label> --}}

                                <div class="col-md-12 text-center d-flex justify-content-end mt-2 mb-2 p-1 ">
                                    <select wire:model="selectColums" multiple>
                                        @foreach ($columns as $column)
                                        <option value="{{ $column }}"> {{ $column }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        {{-- All task : {{ $todoCount }} table-bordered --}}
                        <table class="table table-hover table-striped table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input class="form-check-input" wire:model='selectPage' type="checkbox"
                                            id="flexCheckDefault">
                                    </th>
                                    @if ($this->showColumn('Id'))
                                    <th width='6%'>#
                                        <span wire:click='sortBy("id")' class="float-right text-sm"
                                            style="cursor: pointer">
                                            <i
                                                class="fa fa-arrow-up {{ $sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i
                                                class="fa fa-arrow-down {{ $sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    @endif

                                    @if ($this->showColumn('Task'))
                                    <th scope="col">Task
                                        <span wire:click='sortBy("name")' class="text-sm" style="cursor: pointer">
                                            <i
                                                class="fa fa-arrow-up {{ $sortColumnName === 'name' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i
                                                class="fa fa-arrow-down {{ $sortColumnName === 'name' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    @endif

                                    @if ($this->showColumn('Action')) <td>Action</td> @endif
                                    @if ($this->showColumn('CreatedAt')) <td>Create At</td> @endif
                                    @if ($this->showColumn('Options')) <td></td> @endif
                                </tr>
                            </thead>

                            @if ($selectPage || $selectIteams)
                            <div class="alert alert-info">
                                <button class="btn btn-primary" wire:click.prevent='selectAll'>Select All</button>
                                @if ($search)
                                <button class="btn btn-primary" wire:click.prevent='selectAllOnSearch'>Select
                                    All with search</button>
                                @endif
                            </div>
                            <button class="btn btn-danger" wire:click.prevent='deleteSelectIteams'>Delete
                                Selection {{ count($selectIteams) }}
                            </button>
                            @endif
{{--  --}}
                            {{-- <tbody wire:poll.500ms> --}}
                            <tbody wire:loading.class='text-muted'>
                                @forelse ($todos as $todo)
                                {{-- @dd($todos->firstItem()) --}}
                                <tr>
                                    <td><input class="form-check-input" wire:model='selectIteams'
                                            value="{{ $todo->id }}" type="checkbox" id="flexCheckDefault">
                                    </td>
                                    @if ($this->showColumn('Id'))
                                    <th scope="row">{{ ($todos->currentPage() - 1) * $todos->perPage() +
                                        $loop->iteration }}
                                        @endif
                                    </th>

                                    @if ($this->showColumn('Task'))
                                    <td>
                                        @if ($todo->action == 1)
                                        <del>{{ $todo->name }}</del>@else {{ $todo->name }}
                                        @endif
                                    </td>
                                    @endif

                                    @if ($this->showColumn('Action'))
                                    <td>
                                        @if ($todo->action == 1)
                                        <span class="badge badge-sm bg-success">Complete</span>
                                        @else
                                        <span class="badge badge-sm bg-danger">UnCompleted </span>
                                        @endif
                                    </td>
                                    @endif

                                    @if ($this->showColumn('CreatedAt')) <td>{{ $todo->created_at->diffForHumans() }}
                                    </td> @endif

                                    @if ($this->showColumn('Options'))
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#updatesTodo"
                                                wire:click.prevent='edit({{ $todo->id }})'>
                                                <i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary"
                                                wire:click.prevent='delete({{ $todo->id }})'>
                                                <i class="fas fa-trash-alt" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#editTodo" wire:click.prevent='edit({{ $todo->id }})'>
                                                <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Show"></i>
                                            </button>
                                            @if ($todo->action == 0)
                                            <button type="button" class="btn btn-outline-primary"
                                                wire:click.prevent='completed({{ $todo->id }})'>
                                                <i class="far fa-check-circle " data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Complete"></i>
                                            </button>
                                            @else
                                            <button type="button" class="btn btn-outline-primary"
                                                wire:click.prevent='unCompleted({{ $todo->id }})'>
                                                <i class="fas fa-ban" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="UnComplete"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="5">
                                        Nuk ka resultat
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="body-footer d-flex justify-content-end">
                        {{ $todos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>