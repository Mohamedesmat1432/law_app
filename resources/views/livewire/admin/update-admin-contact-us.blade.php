
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="updateContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل العميل </h5>
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
                        <input class="form-control" type="text"  wire:model="name" placeholder="الأسم" required  autocomplete/>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group ">
                        <label for="address"> العنوان</label>
                        <input wire:model="address" class="form-control" placeholder="العنوان" required autocomplete>
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group ">
                        <label for="phone">  رقم الهاتف</label>
                        <input wire:model="phone" class="form-control" placeholder="رقم الهاتف" required autocomplete>
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group ">
                        <label for="problem"> المشكلة</label>
                        <textarea wire:model="problem" class="form-control" cols="30" rows="3" placeholder="المشكلة" required autocomplete></textarea>
                        @error('problem') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="updateContact()">تعديل</button>
            </div>
        </div>
    </div>
</div>
