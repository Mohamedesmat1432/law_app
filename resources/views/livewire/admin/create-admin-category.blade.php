
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة قسم جديد</h5>
                <button type="button" class="close" wire:click.prevet="resetInput()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right">
                    @csrf
                    <div class="form-group">
                        <label for="name">القسم </label>
                        <input class="form-control" type="text"  wire:model="name" placeholder="القسم" required autofocus />
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="createCategory()">اضافة</button>
            </div>
        </div>
    </div>
</div>
