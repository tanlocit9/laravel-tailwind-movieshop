<div>
    <div class="flex md:inline-flex">
        @include('layouts.frontend.navbar')
    </div>
    <div class="flex md:inline-flex w-full">
        @include('layouts.frontend.navigator')
    </div>
        @switch($tab)
            @case('index')
                @livewire('frontend.index')
            @break
            @case('show-time')
                @livewire('frontend.show-time')
            @break
            @case('show-movie')
                @livewire('frontend.show-movie',['movie'=>$movie])
            @break
            @default
                @case('book-ticket')
                    @livewire('frontend.book-ticket',['movie'=>$movie])
                @break
        @endswitch
</div>
