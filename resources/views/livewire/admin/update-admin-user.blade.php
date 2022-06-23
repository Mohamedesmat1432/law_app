
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل المستخدم </h5>
                <button type="button" class="close" wire:click.prevet="resetInput()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right">
                    @csrf
                    <input type="hidden" wire:model="ids">
                    <div class="form-group">
                        <label for="name">الأسم </label>
                        <input  class="form-control" type="text" wire:model="name" placeholder="الأسم"  required/>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">العنوان الالكتروني </label>
                        <input class="form-control" type="text" wire:model="email" placeholder="العنوان الألكتروني"  required/>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="utype" >اختر الصلاحية</label>
                        <select class="form-control" wire:model="utype">
                            <option value="#">اختر الصلاحية</option>
                            <option value="ADM">Admin</option>
                            <option value="USR">User</option>
                        </select>
                        @error('utype')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="updateUser()">تعديل</button>
            </div>
        </div>
    </div>
</div>
