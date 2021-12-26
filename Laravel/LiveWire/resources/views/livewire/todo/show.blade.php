<!-- Modal -->
{{-- wire:ignore.self per tu hequr backroundi i zi pas submitit --}}
<div wire:ignore.self class="modal fade" id="editTodo" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ndrysho Todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="hidden" wire:model='ids'>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Databse id </th>
                                <td>{{ $ids }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Task </th>
                                <td>{{ $name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Action </th>
                                <td>
                                    @if ($action == 1)
                                        <span style="color: red">E pa kryer</span>
                                    @else
                                        <span style="color: green">E kryer</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">U krija me </th>
                                <td>
                                    {{ strftime('%e %B, %Y', strtotime($created_at)) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
            </div>
        </div>
    </div>
</div>
