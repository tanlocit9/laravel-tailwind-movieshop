<div id="sideBar"
    class="m-2 mr-0 rounded shadow h-screen flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl duration-500 animation-fill-both">
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
        <a @if($tab!='default' )wire:click.prevent="changeTab('default')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-chart-pie text-xs mr-2"></i>
            Analytics dashboard
        </a>
        <!-- end link -->

        {{-- <!-- link -->
    <a href="backend/./index-1.blade.php" class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-shopping-cart text-xs mr-2"></i>
        ecommerce dashboard
    </a>
    <!-- end link --> --}}

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Management</p>

        <!-- link -->
        <a @if($tab!='user' )wire:click.prevent="changeTab('user')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            Users
        </a>
        <!-- end link -->

        <!-- link -->
        <a @if($tab!='movie' )wire:click.prevent="changeTab('movie')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Movies
        </a>
        <!-- end link -->
        <!-- link -->
        <a @if($tab!='genre' )wire:click.prevent="changeTab('genre')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Genres
        </a>
        <!-- link -->
        <a @if($tab!='movie_genre' )wire:click.prevent="changeTab('movie_genre')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Movies - genres
        </a>
        <!-- end link -->

        <!-- link -->
        <a @if($tab!='theater' )wire:click.prevent="changeTab('theater')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-shield-check text-xs mr-2"></i>
            Theaters
        </a>
        <!-- end link -->

        <!-- link -->
        <a @if($tab!='actor' )wire:click.prevent="changeTab('actor')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-shield-check text-xs mr-2"></i>
            Actors
        </a>

        <a @if($tab!='movie_actor' )wire:click.prevent="changeTab('movie_actor')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-shield-check text-xs mr-2"></i>
            Movies - Actors
        </a>

        <a @if($tab!='schedule' )wire:click.prevent="changeTab('schedule')" @endif
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-shield-check text-xs mr-2"></i>
            Schedules
        </a>
        <!-- end link -->
        <!-- link -->
        {{-- <a href="{{route('manage_movie_calendar')}}" class="cursor-pointer mb-3 capitalize font-medium text-sm
        hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-calendar-edit text-xs mr-2"></i>
        Movie Calendar
        </a> --}}
        <!-- end link -->

    </div>
    <!-- end sidebar content -->

</div>
