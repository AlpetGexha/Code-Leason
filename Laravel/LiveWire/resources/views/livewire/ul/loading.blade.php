<div>
    <button wire:click="checkout">Checkout</button> <br>
    <button wire:click="checkout1">Checkout1</button> <br>
    <button wire:click="checkout2">Checkout2</button> <br>
    <button wire:click="checkout3">Checkout3</button> <br>

    {{ $count }}
    {{-- wire:loading shfaqe vetem deri sa te kryet requesti ne network --}}
    <div wire:loading>
        Processing Counting...
    </div>
    <br>
    {{-- Loading delay --}}
    <div wire:loading.delay>nothing</div> <!-- 200ms -->
    <div wire:loading.delay.shortest> shortest </div> <!-- 50ms -->
    <br>
    {{-- <div wire:loading.delay.shorter>shorter</div> <!-- 100ms -->
        <div wire:loading.delay.short>short</div> <!-- 150ms -->
        <div wire:loading.delay.long>long</div> <!-- 300ms -->
        <div wire:loading.delay.longer>longer</div> <!-- 500ms -->
        <div wire:loading.delay.longest>longest</div> <!-- 1000ms --> --}}

    {{-- </div>
        <div wire:loading.block>...</div>
        <div wire:loading.flex>...</div>
        <div wire:loading.grid>...</div>
        <div wire:loading.inline>...</div>
        <div wire:loading.table>...</div> --}}
    <div wire:loading wire:target='checkout3'>
        target chekout 2
    </div>
</div>
