<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="input-group mb-3 col-3">
            <input wire:model='name' type="text" class="form-control" placeholder="Name"
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
        </div>
        @error('name') <p style="color: red">{{ $message }}</p> @enderror

    </form>


    <table class="table table-striped table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </th>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Action</th>
                <th scope="col">Create At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <input wire:model="search" class="form-control me-2" type="search" placeholder="Kërkoni">
            {{-- <button class=" btn btn-outline-success" type="submit" name="submit">Kërko</button> --}}
            @foreach ($todos as $todo)
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <th scope="row"> {{ $i++ }} </th>
                    <td>{{ $todo->name }}</td>
                    <td>
                        @if ($todo->action == 1)
                            <span class="badge badge-sm bg-success">Complete</span>
                        @else
                            <span class="badge badge-sm bg-danger">UnCompleted </span>
                        @endif
                    </td>
                    <td>{{ strftime('%e %B, %Y', strtotime($todo->created_at)) }}</td>
                    <td>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal{{ $todo->id }}"> <i
                                class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit"></i></button>
                        <button wire:click="delete({{ $todo->id }})"><i class="fas fa-trash-alt"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i></button>
                        <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"></i>

                        @if ($todo->action == 0)
                            <button wire:click="Completed({{ $todo->id }})">
                                <i class="far fa-check-circle " data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Complete"></i>
                            </button>
                        @endif
                    </td>
                </tr>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="exampleModal{{ $todo->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Task id: {{ $todo->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="modal-body">
                                <div class="form-floating">
                                    <textarea wire:model='name' class="form-control" id="floatingTextarea2"
                                        style="height: 100px">{{ $todo->name }}</textarea>
                                    <label for="floatingTextarea2">Text</label>
                                    @error('name') <span style="color: red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click="update({{ $todo->id }})" type="submit" class="btn btn-primary"
                                    wire:ignore.self>Ruaj</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
<div class="btn-group" role="group" aria-label="Basic outlined example">
    <button type="button" class="btn btn-outline-primary">
        <i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-outline-primary">
        <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
    </button>
    <button type="button" class="btn btn-outline-primary">
        <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"></i>
    </button>
    <button type="button" class="btn btn-outline-primary">
        <i class="far fa-check-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="Complete"></i>
    </button>
</div>
