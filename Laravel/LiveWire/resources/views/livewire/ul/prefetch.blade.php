<div>
    <label> Prefetch </label>
    <div>
        <button wire:mouseenter.prefetch="loadEmployee">
            Load Todos ID
        </button>
        @foreach ($todos as $todo)
            {{ $todo->id }}
        @endforeach
    </div>
</div>
