<div>
    <div x-data="{ open:false }">
        <button @click="open = !open">Open Me</button>

        {{-- away pasi te prekim me kursorin e mausit dicka  tjeter --}}
        <div x-show="open" @click.away="open = false">A e qele po </div>=
    </div>

    <x-dropdown>
        <x-slot name="trigger">
            <button>Show More...</button>
        </x-slot>

        <ul>
            <li><button wire:click="archive">Archive</button></li>
            <li><button wire:click="delete">Delete</button></li>
        </ul>
    </x-dropdown>
</div>
