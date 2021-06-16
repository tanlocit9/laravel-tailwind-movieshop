@extends('layouts.main')

@section('content')
<div class="grid grid-cols-5 pl-5 py-4 text-teal-500 justify-center border-b border-gray-800">
    <div>
        {Để gì đó khác}
    </div>
    <div>
        {Để gì đó khác}
    </div>
    <div class="">
        <div class= "text-3xl text-center">{{ __('Login') }}</div>
            <form method="POST" action="{{ route('login') }}"class="my-5">
                @csrf
                <div class="grid grid-rows-4 gap-0 space-y-3">
                    {{-- <i class="fa fa-user fa-1x" aria-hidden="true"></i> --}}
                    <div class="mx-6">
                        <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                        <input id="email" type="email"
                        class="text-black bg-white rounded-full pl-8 focus:outline-none focus:ring w-full h-8
                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus
                        placeholder="Example@gmail.com">

                        </input>

                        @error('email')
                            <span class="invalid-feedback pl-1" role="alert">
                                <strong>Email or password maybe wrong.</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-4 mx-6">
                        <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                        <input id="password" type="password"
                        class="text-black bg-white rounded-full pl-8 focus:outline-none focus:ring w-full h-8
                        @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="******************">
                        @error('password')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-4 mx-6">
                        <button type="submit" class="text-lg text-green-500 rounded-full bg-black text-center w-full h-8">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="mt-4 mx-6 rounded-full text-center">
                        @if (Route::has('password.request'))
                            <a class="text-lg text-red-500 " href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <a href="{{ route('login_with_socialite',['provider'=>'google']) }}"
                        class="text-center w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 focus:outline-none focus:ring">
                        Login with Google
                    </a>
                    <a href="{{ route('login_with_socialite',['provider'=>'facebook']) }}"
                        class="text-center w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 focus:outline-none focus:ring"
                        >
                        Login with Facebook
                    </a>
                    {{-- @if (Route::has('password.request'))
                            <a class="text-lg text-red-500" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                </div>
            </form>
        </div>
        <div>
            {Để gì đó khác}
        </div>
        <div>
            {Để gì đó khác}
        </div>
    </div>
</div>
@include('components.alert')
@endsection
