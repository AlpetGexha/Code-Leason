<div>
    <form wire:submit.prevent="update">
        <div>
            @if (session()->has('message'))
                <p style="color: green;s">
                    {{ session('message') }}
                </p>
            @endif
        </div>

        Title: <input wire:model="name" type="text">
        <br> @error('name') {{ $message }} @enderror <br>
        <button>Save</button>
    </form>
