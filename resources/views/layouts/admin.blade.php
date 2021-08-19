<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('/backend/img/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pikaday.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    @livewireStyles
    <title>BakaMovie Admin</title>
</head>

<body class="bg-gray-900 flex flex-col h-screen">
    @auth('staff')
    <div class="flex md:inline-flex w-full h-1/12">
        @livewire('backend.navbar')
    </div>
    <livewire:backend.master />
    @else
    @livewire('backend.login-controller')
    @endauth()




    @livewireScripts
    <script>
        var data;
    Livewire.on("datatable", (tab) => {
        data=$('#'+tab).DataTable({
            autoWidth: true,
            responsive: true,
            bDestroy: true
        }).columns.adjust();
    })

    </script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/scrollBlock.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $( "#adatepicker" ).datepicker({
            format: 'dd-mm-yyyy'
        });
    });
    </script>
</body>
@include('components.alert')

</html>
