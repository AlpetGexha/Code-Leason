<style>
    .error {
        color: red;
    }

</style>
<div>
    <h3>Upload Fiel</h3>

    <form action="" wire:submit.prevent='save'>
        <label for="">Photo</label>
        <input type="file" wire:model='photo'>
        @error('photo') <span class="error">{{ $message }}</span> @enderror
        <br><br>
        <button type="submit">submit</button>
    </form>

    <form wire:submit.prevent="multiFileUpload">
        <input type="file" wire:model="photos" multiple>
     
        @error('photos') <span class="error">{{ $message }}</span> @enderror
     
        <button type="submit">Save Photos</button>
    </form>

</div>
