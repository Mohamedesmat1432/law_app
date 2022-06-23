
<!-- Modal -->
<div wire:ignore.self class="modal fade"   id="updatePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل المنشورات</h5>
                <button type="button" class="close" wire:click.prevet="resetInput()"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right" >
                    @csrf
                    <input type="hidden" wire:model="ids">
                    <div class="form-group">
                        <label for="name">العنوان </label>
                        <input class="form-control" type="text" wire:model="name" placeholder="العنوان" required  autocomplete/>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group ">
                        <label for="description"> الوصف</label>
                        <textarea wire:model="description" class="form-control" cols="30" rows="3" placeholder="الوصف" required autofocus></textarea>
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id" >اختر القسم</label>
                        <select class="form-control" wire:model="category_id">
                            <option value="#">اختر القسم</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" dir="ltr">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevet="resetInput()">اغلاق</button>
                <button type="button" class="btn btn-success" wire:click.prevent="updatePost()">تعديل</button>
            </div>
        </div>
    </div>
</div>
