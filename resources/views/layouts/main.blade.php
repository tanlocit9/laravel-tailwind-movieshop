<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
@livewire('frontend.form-login')

</html>
@include('components.alert')
