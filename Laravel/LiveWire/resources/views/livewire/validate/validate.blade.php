<div>
    <style>
        .error {
            color: red;
        }

    </style>
    {{ now() }}

    <h3>Live Time</h3>
    <form action="" wire:submit.prevent='submit'>
        <label for="">Emri</label>
        <input type="text" wire:model='name'>
        @error('name') <span class="emri">{{ $message }}</span> @enderror
        <br>

        <label for="">email</label>
        <input type="text" wire:model='email'>
        @error('email') <span class="error">{{ $message }}</span> @enderror
        <br>
        <label for="">password</label>
        <input type="text" wire:model='password'>
        @error('password') <span class="error">{{ $message }}</span> @enderror
        <br>
      <br>
        <button type="submit">submit</button>
    </form> 
</div>
