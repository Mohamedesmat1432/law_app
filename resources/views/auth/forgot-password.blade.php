<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}

    <div class="container my-3">
        <div class="row">
            <div class="text-right h3">
                نسيت رقمك السري؟ <span class="text-paj h4">لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل لك رابط إعادة تعيين كلمة المرور عبر البريد الإلكتروني الذي سيسمح لك باختيار عنوان جديد.</span>
            </div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12">
                <form method="POST" action="{{ route('password.email') }}" class="text-right">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="email">عنوانك الالكتروني</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="عنوانك الالكتروني" required autofocus/>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="اعادة تعين كلمة المرور" name="submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
