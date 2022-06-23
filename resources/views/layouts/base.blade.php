<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','home page')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/404.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    @livewireStyles
</head>

<body>
    <div dir="rtl">
        @livewire('header')
        <section class="font-italic">
            {{ $slot }}
        </section>
        @livewire('footer')
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    @livewireScripts

    @stack('script')
    <script>
        window.livewire.on('postCreated',()=>{
            $('#createPost').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('postUpdated',()=>{
            $('#updatePost').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('contactCreated',()=>{
            $('#createContact').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('contactUpdated',()=>{
            $('#updateContact').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('categoryCreated',()=>{
            $('#createCategory').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('categoryUpdated',()=>{
            $('#updateCategory').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('WeKownCreated',()=>{
            $('#createWeKown').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('weKownUpdated',()=>{
            $('#updateWeKown').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('userCreated',()=>{
            $('#createUser').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('userUpdated',()=>{
            $('#updateUser').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('sliderCreated',()=>{
            $('#createSlider').modal('hide');
        });
    </script>
    <script>
        window.livewire.on('sliderUpdated',()=>{
            $('#updateSlider').modal('hide');
        });
    </script>
    {{-- <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbo-eval="false" data-turbolinks-eval="false"></script> --}}
</body>

</html>
