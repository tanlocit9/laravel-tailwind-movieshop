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
    @case('history')
    @livewire('frontend.history')
    @break
    @case('show-time')
    @livewire('frontend.show-time')
    @break
    @case('show-movie')
    @livewire('frontend.show-movie',['movie'=>$movie])
    @break
    @default
    @case('book-ticket')
    @livewire('frontend.book-ticket', ['movie' => $movie, 'calendar' => $calendar])
    @break
    @case('select-seat')
    @livewire('frontend.select-seat', ['movie' => $movie, 'calendar' => $calendar])
    @livewire('frontend.modal.payment', ['movie' => $movie, 'calendar' => $calendar])
    @break
    @endswitch
    @livewire('shared.modal.inform')
</div>
