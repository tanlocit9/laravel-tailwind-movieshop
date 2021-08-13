<div class="container object-cover flex md:inline-flex h-11/12">
    <div class="w-2/12">
        @include('layouts.backend.sidebar')
    </div>
    <div class="w-10/12">
        @if ($tab=='index')
        {{-- <livewire:backend.index /> --}}
        @else
        @if(in_array(Component::findByName($tab)->first()->id,$accessibleComponentIds))
        @switch($tab)
        @case('index')
        @break
        @case('user')
        @livewire('backend.management.user-management')
        @break
        @case('movie')
        @livewire('backend.management.movie-management')
        @livewire('backend.modal.movie-edit',['countries'=>$countries,'genres'=>$genres])
        @break
        @case('genre')
        @livewire('backend.management.genre-management')
        @break
        @case('theater')
        @livewire('backend.management.theater-management')
        @break
        @case('actor')
        @livewire('backend.management.actor-management')
        @break
        @case('schedule')
        @livewire('backend.management.schedule-management')
        @break
        @case('role')
        @livewire('backend.management.role-management')
        @break
        @case('ticket')
        @livewire('backend.management.ticket-management')
        @livewire('backend.modal.ticket-edit')
        @break
        @default
        @include('components.coming-soon')
        @break
        @endswitch
        @else
        @include('components.forbidden')
        @endif @endif
    </div>
</div>
