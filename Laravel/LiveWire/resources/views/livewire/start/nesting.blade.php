<div>
    @foreach ($names as $name)

        <div>
            @livewire('start.say-hi',['name' => $name])
        </div>
    @endforeach
    <hr>
    {{ now() }}
    {{-- I ben te gjita refresh --}}
    {{-- <button wire:click='refreshAll'> Refresh ALL</button> --}}

    {{-- I ben te gjita refresh  po jo veten --}}
    <button wire:click="$emit('refreshAll')"> Refresh ALL</button>

</div>
