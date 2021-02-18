<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('/backend/img/fav.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">

    <script src="{{asset('/js/app.js')}}" type="text/javascript"></script>

    <title>BakaMovie Admin</title>
</head>
<body class="bg-gray-800">
<!-- start navbar -->
<div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-gray-800 p-6 border-b border-gray-300">
    <!-- logo -->
    <div class="flex-none w-56 flex flex-row items-center">
        <strong class="capitalize ml-1 flex-1">BakaMovie</strong>

        <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
            <i class="fad fa-list-ul"></i>
        </button>
    </div>

    <!-- end logo -->
    <!-- navbar content toggle -->
    <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
        <i class="fad fa-chevron-double-down"></i>
    </button>
    <!-- end navbar content toggle -->

    <!-- navbar content -->
    <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
        <!-- left -->
        <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
            {{-- <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>
            <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>
            <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>
            <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a> --}}
        </div>
        <!-- end left -->

        <!-- right -->
        <div class="flex flex-row-reverse items-center right-0">
            <!-- user -->
            <div class="dropdown relative md:static">
                <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                    <div class="w-8 h-8 overflow-hidden rounded-full">
                        <img class="w-full h-full object-cover" src="{{asset('backend/img/user.svg')}}" >
                    </div>
                    <div class="ml-2 capitalize flex ">
                        <h1 class="text-sm text-red-800 font-semibold m-0 p-0 leading-none">{{Auth::user()->name}}</h1>
                        <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
                    </div>
                </button>
                <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
                <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
                <!-- item -->
                    <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                    <i class="fad fa-user-edit text-xs mr-1"></i>
                    edit my profile
                    </a>
                    <!-- end item -->
                    <!-- item -->
                    <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                    <i class="fad fa-inbox-in text-xs mr-1"></i>
                    my inbox
                    </a>
                    <!-- end item -->
                    <!-- item -->
                    <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                    <i class="fad fa-badge-check text-xs mr-1"></i>
                    tasks
                    </a>
                    <!-- end item -->
                    <!-- item -->
                    <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                    <i class="fad fa-comment-alt-dots text-xs mr-1"></i>
                    chats
                    </a>
                    <!-- end item -->
                    <hr>
                    <!-- item -->
                    <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

                    <i class="fad fa-user-times text-xs mr-1"></i>
                    log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- end item -->
                </div>
            </div>
            <!-- end user -->
        </div>
        <!-- end right -->
    </div>
    <!-- end navbar content -->

</div>
<!-- end navbar -->
    <!-- strat wrapper -->
    <div class="h-screen flex flex-row flex-wrap">

        <!-- start sidebar -->
        <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
        <!-- sidebar content -->
        <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

        <!-- link -->
        <a href="{{route('admin')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-chart-pie text-xs mr-2"></i>
            Analytics dashboard
        </a>
        <!-- end link -->

        {{-- <!-- link -->
        <a href="backend/./index-1.blade.php" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-shopping-cart text-xs mr-2"></i>
            ecommerce dashboard
        </a>
        <!-- end link --> --}}

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Management</p>

        <!-- link -->
        <a href="{{route('manage_user')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-envelope-open-text text-xs mr-2"></i>
        Users
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{route('manage_movie')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Movies
        </a>
        <!-- end link -->
        <!-- link -->
        <a href="{{route('manage_genre')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Genres
        </a>
        <!-- link -->
        <a href="{{route('manage_movie_genre')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Movies - genres
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{route('manage_theater')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-shield-check text-xs mr-2"></i>
            Theaters
        </a>
        <!-- end link -->

        <!-- link -->
        {{-- <a href="{{route('manage_movie_calendar')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-calendar-edit text-xs mr-2"></i>
            Movie Calendar
        </a> --}}
        <!-- end link -->

        </div>
        <!-- end sidebar content -->

    </div>
    <!-- end sidebar -->
    @yield('content')
</div>
<!-- end wrapper -->

<!-- script -->
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('/js/modal.js')}}"></script>
@include('components.alert')

<!-- end script -->

</body>
</html>
