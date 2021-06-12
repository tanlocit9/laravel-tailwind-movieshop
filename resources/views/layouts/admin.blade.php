<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('/backend/img/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

    @livewireStyles
    <title>BakaMovie Admin</title>
</head>

<body class="bg-gray-900 flex flex-col h-screen">

    <livewire:backend.master />
    <!-- script -->
    @livewireScripts
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script>
        Livewire.on("datatable", (tab) => {
            $('#'+tab).DataTable({
                responsive: true,
                bDestroy: true
            }).columns.adjust();
        })

    </script>
</body>
@include('components.alert')

</html>
