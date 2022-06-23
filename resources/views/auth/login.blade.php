@section('title','login page')
<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('login') }}" class="text-right">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="email">عنوانك الالكتروني</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="عنوانك الالكتروني" required autofocus autocomplete/>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group ">
                        <label for="email">كلمة السر</label>
                        <input id="password" class="form-control" type="password" name="password" placeholder="كلمة السر" required autocomplete />
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="remember_me" class=" control-label pl-3 bold text-dark">
                            <input type="checkbox" id="remember_me" name="remember" />
                            <span class="ml-2 text-lg bold text-zety">تذكرني</span>
                        </label>
                        <label for="forgetpassword" class=" control-label pl-3 bold float-left">
                            @if (Route::has('password.request'))
                                <a class="text-left text-zety" href="{{ route('password.request') }}">
                                    هل نسيت كلمة السر ؟
                                </a>
                            @endif
                        </label>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="دخول" name="submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
