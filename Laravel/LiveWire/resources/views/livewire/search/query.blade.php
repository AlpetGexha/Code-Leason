<div>
    <div>query time {{ now() }}</div>

    <input wire:model="search" type="search" placeholder="Search ">

    <h1>Search Results:</h1>

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo->name }}</li>
        @endforeach
    </ul>

</div>
