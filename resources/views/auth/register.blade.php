@extends('layouts.main')

@section('content')
<div class="pl-5 py-4 text-blue-300 justify-center border-b border-gray-800">
    <div>
        <div>
            <div >
                <div class="text-3xl">{{ __('Register Place') }}</div>

                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div >
                            <label for="name">{{ __('Name') }}</label>
                            <div >
                                <input id="name" type="text" class="text-black bg-teal-400 pl-2 rounded-full focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="text-black bg-teal-400 pl-2 rounded-full focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="text-black bg-teal-400 pl-2 rounded-full focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="text-black bg-teal-400 pl-2 rounded-full focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="text-lg text-green-500">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
