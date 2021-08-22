<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/backend/img/fav.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://use.fontawesome.com/692bdfc97d.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-900 text-white ml-5 flex flex-col h-screen">
    <livewire:frontend.master/>
    @livewireScripts
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/scrollBlock.js') }}" type="text/javascript"></script>
</body>
<footer>
    @include('layouts.frontend.footer')
</footer>
@livewire('frontend.login-controller')
<script type="text/javascript">
    window.onscroll = function (ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
</script>
</html>
@include('components.alert')
