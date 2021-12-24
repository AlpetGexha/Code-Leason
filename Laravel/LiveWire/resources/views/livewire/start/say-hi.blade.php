<div>
    <input type="text" wire:model='name' style="margin-top: 1rem">

    {{ $name }}
    {{-- Vetem data e thene behet refresh pa pasur nevoj te behen te gjitha --}}
    <button wire:click="$refresh"> Refesh</button>

    {{ now() }}
</div>
