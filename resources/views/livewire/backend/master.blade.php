<div class="h-full">
    <div class="flex md:inline-flex w-full h-1/12">
        @include('layouts.backend.navbar')
    </div>
    <div class="container object-cover flex md:inline-flex h-11/12">
        <div class="w-2/12">
            @include('layouts.backend.sidebar')
        </div>
        <div class="w-10/12 h-full">
            @switch($tab)
            @case('default')
            <livewire:backend.index />
            @break
            @case('user')
            @include('components.table.tb-user',['items'=>$users])
            @break
            @case('movie')
            @include('components.table.tb-movie',['items'=>$movies])
            @livewire('backend.modal.movie-edit',['countries'=>$countries,'genres'=>$genres])
            @break
            @case('genre')
            @include('components.table.tb-genre',['items'=>$genres])
            @break
            @case('movie_genre')
            @include('components.table.tb-movie-genre',['items'=>$movies])
            @break
            @case('theater')
            @include('components.table.tb-theater',['items'=>$theaters])
            @break
            @case('actor')
            @include('components.table.tb-actor',['items'=>$actors])
            @break
            @case('movie_actor')
            @include('components.table.tb-movie-actor',['items'=>$movies])
            @break
            @case('schedule')
            @include('components.table.tb-schedule',['items'=>$schedules])
            @break
            @default
            <livewire:backend.index />
            @endswitch

        </div>
    </div>
</div>
