
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="updateWeKown" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات عضو </h5>
                <button type="button" class="close" wire:click.prevet="resetInput()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" wire:model="ids">
                    <div class="form-group">
                        <label for="name">الأسم </label>
                        <input class="form-control" type="text"  wire:model="name" placeholder="الأسم" required  autofocus autocomplete/>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="newimage">الصورة </label>
                        <input class="form-control" type="file" wire:model="newimage" placeholder="الصورة" required  autofocus/>
                        @error('newimage')<span class="text-danger">{{$message}}</span>@enderror
                        {{-- @if ($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="60"/>
                        @else
                            <img src="{{asset('assets/images/personals/'.$image)}}" alt="صوره العضو" width="60">
                        @endif --}}
                    </div>
                    <div class="form-group ">
                        <label for="information"> معلومات</label>
                        <textarea type="text" wire:model="information" class="form-control" cols="30" rows="3" placeholder="معلومات عن العضو" required ></textarea>
                        @error('information') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف </label>
                        <input class="form-control" type="text" wire:model="phone" placeholder="رقم الهاتف" required  />
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">العنوان </label>
                        <input class="form-control" type="text" wire:model="address" placeholder="العنوان" required  />
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="updateWeKown()">تعديل</button>
            </div>
        </div>
    </div>
</div>
