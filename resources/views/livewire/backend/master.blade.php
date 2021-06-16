<div>
    <div class="flex md:inline-flex w-full">
        @include('layouts.backend.navbar')
    </div>
    <div class="flex md:inline-flex">
        @include('layouts.backend.sidebar')

        @switch($tab)
        @case('default')
        <livewire:backend.index />
        @break
        @case('user')
        @include('components.table.tb-user',['items'=>$users])
        @break
        @case('movie')
        @include('components.table.tb-movie',['items'=>$movies])
        @livewire('backend.modal.movie-edit')
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
