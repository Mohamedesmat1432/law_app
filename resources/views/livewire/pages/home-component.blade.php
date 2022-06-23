@section('title', 'home page')
{{-- <style>
    .test-paj .navbar-text a {
        color: rgb(228, 177, 110);
    }
</style> --}}
<div>
    <div class="container-fluid px-0">
        {{-- <h1 class=" text-paj animate">  <span class="text-zety">مرحبا بكم في</span>  موقع مستشارك  </h1> --}}
        <div id="myCarousel" class="carousel slide m-0" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{$slider->id == $slider->max('id') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/sliders/'. $slider->image)}}" class="" alt="Logo" width="100%" height="500">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-paj mb-3">{{$slider->title}}</h1>
                            <p>
                                {{$slider->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev "  href="#myCarousel" data-slide="prev">
                <div class="p-3 bg-zety rounded">
                    <span class="carousel-control-prev-icon"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <div class="p-3 bg-zety rounded">
                    <span class="carousel-control-next-icon"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 text-center">
            <div class="col-md-12">
                <h2 class="text-right border-bottom p-3" >الأقسام</h2>
            </div>
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="p-3">
                        <a href="{{'/category'.'/'.$category->id}}" class="btn btn-success bold w-100 p-3">
                            {{$category->name}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5 text-center">
            <div class="col-md-12">
                <h2 class="text-right border-bottom  p-3">فريق العمل و اساتذة القانون</h2>
            </div>
            @foreach ($wekowns as $data)
                <div class="col-md-3">
                    <img class="rounded-circle" src="{{asset('assets/images/personals/'.$data->image)}}" width="55%" height="200px" />
                    <div class="text-dark">
                        <h5 class="text-paj">الأستاذ</h5>
                        <span>{{$data->name}}</span>
                        <p>
                            <span class="bold text-paj">التخصص / </span>
                            {{$data->information}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
