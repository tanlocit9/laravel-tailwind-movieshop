<div class="text-lg mx-32 mt-3 ">
    <div class="grid grid-cols-4">
        <div class="col-span-3 border border-white">
            <div class="grid grid-cols-4">
                <div class="col-span-3 bg-select-seat bg-center bg-no-repeat bg-cover">
                    <div class=" mx-auto">
                        <div class="screen text-red-900 text-center">SCREEN</div>
                        <div class="exit exit--front"></div>
                        <ol class="cabin max-w-full text-center">
                            @for ($i = 0;$i<strlen($stringSeat);$i++) <li class="w-full">
                                <ol class="flex flex-row flex-nowrap justify-evenly w-full flex-1"
                                    type="{{substr($stringSeat,$i,1) }}">
                                    @for ($j = 1;$j
                                    <strlen($stringSeat)+1;$j++) <li class="flex text-black seat p-1 relative flex-0-7"
                                        wire:click="addToCart('{{substr($stringSeat,$i,1)}}{{$j}}')"> <input
                                            type="checkbox" id="{{substr($stringSeat,$i,1) }}{{$j}}" />
                                        <label
                                            for="{{substr($stringSeat,$i,1) }}{{$j}}">{{substr($stringSeat,$i,1) }}{{$j}}</label>
                                        </li>
                                        @endfor
                                </ol>
                                @endfor
                        </ol>
                        </li>
                        <div class="exit exit--back "></div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-span-1 mx-1">
            <div class="flex flex-col h-full max-w-lg mx-auto bg-gray-800">
                <img class="w-2/3 mx-auto mt-3" src="{{asset('storage/posters')}}/{{$movie->poster}}"
                    alt="{{$movie->title}}">
                <div class="flex justify-between -mt-4 px-4">
                    <span
                        class="inline-block ring-4 bg-red-500 ring-gray-800 rounded-full text-sm font-medium tracking-wide text-yellow-300 px-4 pt-1">
                        <i class="fa fa-star fill-current text-yellow-300" aria-hidden="true"></i>
                        <span>
                            {{number_format($movie->avg_rate(),2)}}</span>
                    </span>
                    <span
                        class="flex space-x-1 items-center rounded-full text-yellow-300 bg-red-500 py-1 px-2 text-xs font-medium ring-4 ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="font-semibold text-xs">
                            {{$movie->duration}}
                        </p>
                    </span>
                </div>
                <div class="flex justify-between px-5">
                    <span>
                        Time start:
                    </span>
                    <span>
                        {{$calendar->time_start}}
                    </span>
                </div>
                <div class="flex justify-between px-5">
                    <span>
                        Discount:
                    </span>
                    <span>
                        0%
                    </span>
                </div>
                <div class="flex justify-between px-5">
                    <span>
                        You have to pay:
                    </span>
                    <span>
                        {{numfmt_format_currency(numfmt_create( 'vn_VN', NumberFormatter::CURRENCY ), Session::get("sessiontotalPriceTickets") + Session::get("sessiontotalPriceCombos"),"VND")}}
                    </span>
                </div>
                @if (session()->has('message'))
                <div class="flex justify-between px-2">
                    <span class="block sm:inline text-red-600">{{ session('message') }}</span>
                </div>
                @endif
                <div class="p-2 mx-auto ">
                    <a wire:click="openSelectSeatForm()"
                        class="cursor-pointer rounded-full bg-white hover:bg-yellow-500 text-black font-semibold py-2 px-4 border border-gray-400 shadow focus:outline-none">
                        Continue
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
