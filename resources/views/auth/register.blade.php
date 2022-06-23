@section('title','register page')

<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('register') }}" class="text-right">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name">الاسم</label>
                        <input id="name" class="form-control item" type="text" name="name" :value="old('name')"  placeholder="الاسم" required autofocus autocomplete="name" />
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">عنوانك الالكتروني</label>
                        <input id="email" class="form-control item" type="email" name="email" :value="old('email')" placeholder="عنوانك الالكتروني" autofocus autocomplete="email"/>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class=" row">
                        <div class="col-md-6 mb-3">
                            <label for="password">كلمة السر</label>
                            <input id="password" class="form-control item" type="password" name="password" placeholder=" كلمة السر" autocomplete="current-password" />
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation">تأكيد كلمة السر</label>
                            <input id="password_confirmation" class="form-control item" type="password" name="password_confirmation" placeholder="تأكيد كلمة السر" required autocomplete="new-password" />
                            @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="form-group">
                            <label for="terms">
                                <div class="flex items-center">
                                    <input type="checkbox" name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            <label>
                        </div>
                    @endif
                    <div class="form-group ">
                        <a class="underline text-zety  hover:text-zety" href="{{ route('login') }}">
                            <span class="pl-3">مسجل بالفعل ؟</span>
                        </a>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-success" type="submit" value="تسجيل دخول" name="submit"/>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
