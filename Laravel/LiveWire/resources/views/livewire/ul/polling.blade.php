<div>
    {{-- Poll eshte per ndryshe  auto update --}}
    <div wire:poll>
        Currect Time : {{ now() }}
    </div>

    {{-- Auto update(Refresh) per cdo 1sekond --}}
    <label> 1000ms</label>
    <div wire:poll.1000ms> {{-- 1000ms = 1sekond --}}
        Currect Time : {{ now() }}
    </div> <br>

    {{-- .keep-alive eshte e ben update edhe kur nuk jena ne broser apo jena me ndonje tab tjeter --}}
    <label>wire:poll.keep-alive</label>
    <div wire:poll.keep-alive>
        Current time: {{ now() }}
    </div> <br>

    {{-- nese nuk shfaqet ne browser perdoim  .visible --}}
    <label>wire:poll.visible</label>
    <div wire:poll.visible>
        Current time: {{ now() }}
    </div>

    <br>
</div>
