@section('title','posts page')

<div>
    <div class="container my-3">
        <h2 class="text-paj animate"><span class="text-zety"> كل ما تريد معرفته</span> عن القانون</h2>
        <div class="row">
            <div class="col-md-12">
                <input type="text"  class="form-control my-3" placeholder="ابحث عن الموضوع ..." wire:model="seachItem" autofocus autocomplete />
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class=" mb-3 text-right">
                            <div class="text-paj h4">
                                <span class="">{{$post->name}}؟</span>
                                {{-- <span class="float-left">{{$post->category->name}}</span> --}}
                            </div>
                            <div class="p-3 border-top">
                                <p class="h5">{{$post->description}}</p>

                                <span class="text-paj">{{date('d-m-Y', strtotime($post->created_at))}}</span>
                                {{-- <span class="text-success">{{$post->created_at->format('h:m:s')}}</span> --}}
                            </div>
                        </div>
                        <hr class="w-100">
                    @endforeach
                @else
                    <section>
                        <div class="col-sm-12 col-sm-offset-1  text-center">
                            <div class="empty-cate rounded">
                            <h3 class="h3 p-3 text-zety">
                                لا يوجد منشورات  !
                            </h3>
                            {{-- <p  class="text-paj">هذه الأقسام فارغة!</p> --}}
                        </div>
                    </section>
                @endif
                <div class="text-right">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
