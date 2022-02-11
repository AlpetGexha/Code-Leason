<!-- Modal -->
{{-- wire:ignore.self per tu hequr backroundi i zi pas submitit --}}
<div wire:ignore.self class="modal fade" id="createTodo" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Krijo Todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-grup">
                        <label for="task">Shrani tasken</label>
                        <input id='text-editor' autofocus="yes" autocomplete="no" type="text" class="form-control" data-note="@this" wire:model.defer='name' />
                        @error('name') <span style="color: red;">{{ $message }} </span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
                <button type="button" class="btn btn-primary" wire:click.prevent='store()'>Krijo</button>
            </div>
        </div>
    </div>
</div>
