@section('title', 'admin we-kown page')

<div>
    @include('livewire.admin.update-admin-we-kown')
    @include('livewire.admin.create-admin-we-kown')
    <div class="container py-5 text-right">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    <span> فريق العمل</span>
                    <button type="button" class="btn btn-success float-left" data-toggle="modal"
                        data-target="#createWeKown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        عضو جديد
                    </button>
                </h3>
                <hr>
                <input type="text" class="form-control my-3" placeholder="ابحث عن العضو ..." wire:model="seachItem"
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
                            <th>الأسم</th>
                            <th>الصورة</th>
                            <th>معلومات</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>التاريخ</th>
                            <th colspan="2">الأحداث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weKownDatas as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <img src="{{ asset('assets/images/personals/' . $data->image) }}" width="50" />
                                </td>
                                <td>{{ $data->information }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#updateWeKown" wire:click.prevent="edit({{ $data->id }})">
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
                                        onclick="confirm('هل انت متأكد من حذف هذا العضو ؟') || event.stopImmediatePropagation()"
                                        wire:click.prevent="delete({{ $data->id }})">
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
                <div class="paginate">
                    {{ $weKownDatas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
