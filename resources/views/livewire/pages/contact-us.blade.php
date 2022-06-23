@section('title','contact-us page')

<div>
    <div class="container my-3">
        <h2 class="text-paj animate"> <span class="text-zety">يمكنك التواصل معانا </span> في اي وقت </h2>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible text-right">
                <button type="button" class="close text-left" data-dismiss="alert">&times;</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <form class="text-right" wire:submit.prevent="createContact()">
                    @csrf
                    <div class="form-group">
                        <label for="name">الأسم</label>
                        <input id="name" class="form-control" type="text" placeholder="الأسم" wire:model="name" required autofocus autocomplete/>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input id="address" class="form-control" type="text" name="address" wire:model="address" placeholder="العنوان" required autocomplete />
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input id="phone" class="form-control" type="text" name="phone" wire:model="phone" placeholder="رقم الهاتف" required autocomplete />
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="problem">  المشكلة</label>
                        <textarea name="problem" id="problem" class="form-control" cols="30" rows="4" wire:model="problem" placeholder=" المشكلة" required autocomplete></textarea>
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">ارسال</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 p-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.0772337986923!2d31.25852921436015!3d30.716229081642876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7c1df310e5b35%3A0x3697f2b8a12cf56f!2sHousny%2C%20Madinet%20Mit%20Ghamr%20(Include%20Daqados)%2C%20Mit%20Ghamr%2C%20Dakahlia%20Governorate!5e0!3m2!1sen!2seg!4v1647983331887!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
