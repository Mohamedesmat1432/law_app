
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> اضافة مستخدم جديد </h5>
                <button type="button" class="close" wire:click.prevet="resetInput()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right">
                    @csrf
                    <div class="form-group">
                        <label for="name">الأسم </label>
                        <input  class="form-control" type="text" wire:model="name" placeholder="الأسم" required autocomplete="username"/>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">العنوان الالكتروني </label>
                        <input  class="form-control" type="text" wire:model="email" placeholder="العنوان الألكتروني" required autocomplete="email" />
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة السر</label>
                        <input id="password" class="form-control item" type="password" wire:model="password" placeholder=" كلمة السر" autocomplete="current-password" />
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
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
                <button type="button" class="btn btn-success" wire:click.prevent="createUser()">اضافة</button>
            </div>
        </div>
    </div>
</div>
