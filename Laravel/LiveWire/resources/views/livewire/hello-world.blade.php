<div>
    <input wire:model='surename' type="text">

    Hello {{ $name }} , {{ $surename }} <br>

    Numero : {{ $counts }}
    <button wire:click="Counter">+</button> <br>

    <input type="text" wire:model='name'>
    <select wire:model='selection' multiple>

        <option>PHP</option>
        <option>JAVA</option>
        <option>JavaScript</option>
        <option>C++</option>

    </select>
    <input type="checkbox" wire:model='checkbox'> <br><br><br>

    Pershendetje une quhem {{ $name }} gjuha ime e preferuar eshte
    {{ implode(', ', $selection) }} @if ($checkbox) !!! @endif
    <br><br>

    <button wire:click='resetName("AlpetClick")'>Reset name Click</button>
    <button wire:mouseenter='resetName("AlpetMouseHover")'>Reset name MouseEnter</button>
    <button wire:click="$set('name', 'AlpetSetMethod ')">Reset name $set</button>
    <br>

    <form action="" wire:submit.prevent='resetName("AlpetFormSubmitPrevent")'>
        <button> Reset name AlpetFormSubmitPrevent</button>
    </form>
    <br>
    <div>

        <label>
            <input wire:model='checkAllBox' value="football" type="checkbox">
        </label>

        <label>
            <input wire:model='checkAllBox' value="baseketboll" type="checkbox">
        </label>


        <label>
            <input wire:model='checkAllBox' value="hokey" type="checkbox">
        </label>

        <label>
            <input wire:model='checkAllBox' value="voleboll" type="checkbox">
        </label>

        Var : <pre>{{ var_export($checkAllBox) }}
    </div>

</div>
