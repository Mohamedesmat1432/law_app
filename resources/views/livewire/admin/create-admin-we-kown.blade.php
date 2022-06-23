
<!-- Modal -->
<div wire:ignore.self class="modal fade"  id="createWeKown" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة عضو جديد </h5>
                <button type="button" class="close" wire:click.prevet="resetInput()"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">الأسم </label>
                        <input class="form-control" type="text" wire:model="name" placeholder="الأسم" required autofocus />
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">الصورة </label>
                        <input class="form-control" type="file" wire:model="image" placeholder="الصورة" required autofocus />
                        @error('image') <span class="text-danger">{{$message}}</span> @enderror
                        {{-- @if ($image)
                            <img src="{{$image->temporaryUrl()}}" width="60"/>
                        @endif --}}
                    </div>
                    <div class="form-group ">
                        <label for="information"> معلومات</label>
                        <textarea type="text" wire:model="information" class="form-control" cols="30" rows="3" placeholder="معلومات عن العضو" required autofocus></textarea>
                        @error('information') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف </label>
                        <input class="form-control" type="text"  wire:model="phone" placeholder="رقم الهاتف" required autofocus />
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">العنوان </label>
                        <input class="form-control" type="text" wire:model="address" placeholder="العنوان" required autofocus />
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="createWeKown()">اضافة</button>
            </div>
        </div>
    </div>
</div>
