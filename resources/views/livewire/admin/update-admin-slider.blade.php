
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="updateSlider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل الواجهة </h5>
                <button type="button" class="close" wire:click.prevet="resetInput()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right">
                    @csrf
                    <input type="hidden" wire:model="ids" />
                    <div class="form-group">
                        <label for="title">العنوان </label>
                        <input class="form-control" type="text" wire:model="title" placeholder="العنوان" required autofocus />
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group ">
                        <label for="description"> الوصف</label>
                        <textarea wire:model="description" class="form-control" cols="30" rows="3" placeholder="الوصف" required autocomplete></textarea>
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="newimage" >اختر الصورة</label>
                        <input type="file" class="form-control" wire:model="newimage" />
                        @error('newimage')<span class="text-danger">{{$message}}</span>@enderror
                        {{-- @if ($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="60"/>
                        @else
                            <img src="{{asset('assets/images/sliders'.'/'.$image)}}"/>
                        @endif --}}
                    </div>
                    <div class="form-group">
                        <label for="link" >اختر الرابط</label>
                        <input class="form-control" type="text" wire:model="link" placeholder="الرابط" required autofocus />
                        @error('link')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="updateSlider()">تعديل</button>
            </div>
        </div>
    </div>
</div>
