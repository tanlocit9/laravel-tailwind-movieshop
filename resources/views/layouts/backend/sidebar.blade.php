<div id="sideBar"
    class="h-screen m-2 mr-0 rounded shadow flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl duration-500 animation-fill-both">
    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">home</p>

        <!-- link -->
        <a wire:click.prevent="changeTab('index')"
            class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 @if ($tab=='index')
            text-red-700
            @endif">
            <i class="fad fa-chart-pie text-xs mr-2"></i>
            Home page
        </a>
        <!-- end link -->

        {{-- <!-- link -->
    <a href="backend/./index-1.blade.php" class="cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-shopping-cart text-xs mr-2"></i>
        ecommerce dashboard
    </a>
    <!-- end link --> --}}

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Management</p>

        @foreach ($accessibleComponentIds as $id)
        @if ($component = Component::find($id))
        <a @if($tab!=$component->name) wire:click.prevent="changeTab('{{$component->name}}')" @endif
            class='cursor-pointer mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out
            duration-500 @if ($tab==$component->name)
            text-red-700
            @endif'>
            <i class="fad fa-tasks text-xs mr-2"></i>
            {{$component->name}}s
        </a>
        @endif
        @endforeach

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
