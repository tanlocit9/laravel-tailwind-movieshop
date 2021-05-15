<div class="text-lg mx-32">
    <ul class="flex flex-row md:flex-col border-b border-orange-500 border-opacity-50 h-10">
        <li class="md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
            <a href="#" wire:click="changeTab('byMovie')">By Movie</a>
        </li>
        <li class="ml-16 md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
            <a href="#" wire:click="changeTab('byCinema')">By Cinema</a>
        </li>
        <li class="ml-16 md:mt-3 md:ml-6 py-2 text-red-400">
            You are choosing {{ $tab=='byMovie'?'Movie':'Cinema' }} first
        </li>
    </ul>
    @if($tab=="byMovie")
        <div class="grid grid-cols-3 gap-12 text-center pt-2">
            <div class="w-96 justify-self-start">
                <h4 class="bg-orange-700 py-1">Select Movie</h4>
                <ul class="">
                    @include('components.show-time.select-movie')
                </ul>
            </div>
            <div class="w-96 justify-self-center">
                <h4 class="bg-orange-700 py-1">Select Cinema</h4>
                @if($selectedMovie)
                    @include('components.show-time.select-theater')
                @endif
            </div>
            <div class="w-96 justify-self-end">
                <h4 class="bg-orange-700 py-1">Select Session</h4>
                @include('components.show-time.select-session')
            </div>
        </div>
        @else
        <!-- By cinema -->
        <div class="grid grid-cols-3 gap-12 text-center pt-2">
            <div class="w-96 justify-self-start">
                <h4 class="bg-orange-700 py-1">Select Cinema</h4>
                <ul class="">
                    @include('components.show-time.select-theater')
                </ul>
            </div>
            <div class="w-96 justify-self-center">
                <h4 class="bg-orange-700 py-1">Select Movie</h4>
                @if($selectedTheater)
                    @include('components.show-time.select-movie')
                @endif
            </div>
            <div class="w-96 justify-self-end">
                <h4 class="bg-orange-700 py-1">Select Session</h4>
                @include('components.show-time.select-session')
            </div>

        </div>
    @endif
</div>
