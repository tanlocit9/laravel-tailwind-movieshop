<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://use.fontawesome.com/692bdfc97d.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-900 text-white ml-5 flex flex-col h-screen">
    <div class="flex md:inline-flex">
        <livewire:frontend.navbar/>
    </div>
    <div class="flex md:inline-flex w-full">
        <livewire:frontend.navigator/>
    </div>
    <div class="mb-8 flex-grow">
        @yield('content')
    </div>
    @livewireScripts
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/scrollBlock.js') }}" type="text/javascript"></script>
    @if (Session::has('login'))
        <script>
            $(document).ready(function() {
                $('#login').get(0).click();
            });
        </script>
        {{ Session::forget('login') }}
    @endif
</body>
<footer>
    @include('layouts.frontend.footer')
</footer>
@livewire('frontend.form-login')

</html>
@include('components.alert')
