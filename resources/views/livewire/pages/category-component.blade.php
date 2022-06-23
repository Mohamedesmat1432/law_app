@section('title','category component page')

<div>
    <div class="container my-3">
        <h2 class="text-paj animate"><span class="text-zety"> نحن متخصصون في     </span> حل المشاكل </h2>
        <div class="row">
            <div class="col-md-4">
                @foreach ($categories as $category)
                    <a class="btn btn-success  btn-block  p-3 mb-3 {{request()->is('category/'.$category->id) ? 'active' : ''}}" href="/category/{{$category->id}}">{{$category->name}}</a>
                @endforeach
            </div>
            <div wire:ignore.self class="col-md-8">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="mb-3 text-right">
                            <div class="text-paj h4">
                                <span class="">{{$post->name}}؟</span>
                                {{-- <span class="float-left">{{$post->category->name}}</span> --}}
                            </div>
                            <div class="text-zety p-3 border-top">
                                <p class="h5">{{$post->description}}</p>
                                <span class="text-paj">{{date('d-m-Y', strtotime($post->created_at))}}</span>
                                {{-- <span class="text-success">{{$post->created_at->format('h:m:s')}}</span> --}}
                            </div>
                        </div>
                        <hr class="w-100 ">
                    @endforeach
                    <div class="text-right">
                        {{$posts->links()}}
                    </div>
                @else
                    <section>
                        <div class="col-sm-12 col-sm-offset-1  text-center">
                            <div class="empty-cate rounded">
                            <h3 class="h3 p-3 text-zety">
                                لا يوجد منشورات في هذا القسم !
                            </h3>
                            <p  class="text-paj">هذا القسم فارغ!</p>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
</div>
