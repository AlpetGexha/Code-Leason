<div x-data="{ open: @entangle('showDropdown') }">
    <button @click="open = true">Show More...</button>
 
    <ul x-show="open" @click.away="open = false">
        <li><button wire:click="archive">Archive</button></li>
        <li><button wire:click="delete">Delete</button></li>
    </ul>
</div>