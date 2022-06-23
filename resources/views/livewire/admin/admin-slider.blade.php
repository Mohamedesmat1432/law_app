@section('title', 'admin slider page')
<div>
    @include('livewire.admin.update-admin-slider')
    @include('livewire.admin.create-admin-slider')
    <div class="container py-5 text-right">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    <span> ادارة الواجهة الرئيسية</span>
                    <button type="button" class="btn btn-success float-left" data-toggle="modal"
                        data-target="#createSlider">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        واجهة جديد
                    </button>
                </h3>
                <hr>
                <input type="text" class="form-control my-3" placeholder="ابحث عن الواجهة ..." wire:model="seachItem"
                    autofocus autocomplete />
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible text-right">
                        <button type="button" class="close text-left" data-dismiss="alert">&times;</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table class="table  table-striped text-center table-bordered rounded table-responsive-md">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>الوصف</th>
                            <th>صوره</th>
                            <th>رابط</th>
                            <th>التاريخ</th>
                            <th colspan="2">الأحداث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td><img src="{{ asset('assets/images/sliders/'.$slider->image) }}" width="60" />
                                </td>
                                <td>{{ $slider->link }}</td>
                                <td>{{ date('d-m-Y', strtotime($slider->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#updateSlider" wire:click.prevent="edit({{ $slider->id }})">
                                        {{-- تعديل --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirm('هل انت متأكد من حذف هذا الواجهة ؟') || event.stopImmediatePropagation()"
                                        wire:click.prevent="delete({{ $slider->id }})">
                                        {{-- حذف --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
