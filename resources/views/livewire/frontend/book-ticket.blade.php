<div class="text-lg mx-32 mt-3">
    <div class="grid grid-cols-4">
        <div class="col-span-3 bg-orange-700">
            <div class="mx-2 ">
                <table class="text-center w-full mt-3">
                    <thead>
                        <tr class="bg-yellow-900">
                            <th class="w-1/2 text-left pl-2">Ticket type</th>
                            <th>Amount</th>
                            <th>Price (VND)</th>
                            <th>Total (VND)</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm bg-yellow-400 text-black">
                        @foreach ($prices as $price)
                        @if($price->price_type_id==1)
                        <tr class="h-12">
                            <th class="w-1/2 text-left pl-2">
                                {{$price->name}} ({{$price->description}})
                            </th>
                            <th>
                                <i class="fa fa-minus cursor-pointer" wire:click="decrease({{$loop->index+1}})"
                                    aria-hidden="true"></i>
                                <input wire:model="amount.{{$loop->index+1}}" type="text" value="0"
                                    class="w-10 pl-2 rounded-md focus:outline-none">
                                <i class="fa fa-plus cursor-pointer" wire:click="increase({{$loop->index+1}})"
                                    aria-hidden="true"></i>
                            </th>
                            <th>{{$price->price}}</th>
                            <th>{{$total_price[$loop->index+1]}}</th>
                        </tr>
                        @endif
                        @endforeach
                        <tr class="h-12">
                            <th class="w-1/2 text-left pl-2">
                                Total
                            </th>
                            <th></th>
                            <th></th>
                            <th>{{$total_ticket}}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="text-center w-full">
                    <thead>
                        <tr class="bg-yellow-900">
                            <th class="w-1/2 text-left pl-2">Combo</th>
                            <th>Amount</th>
                            <th>Price (VND)</th>
                            <th class="text-white">Total (VND)</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm bg-yellow-400 text-black">
                        @foreach ($prices as $price)
                        @if($price->price_type_id==2)
                        <tr class="h-12">
                            <th class="w-1/2 text-left pl-2">
                                {{$price->name}} ({{$price->description}})
                            </th>
                            <th>
                                <i class="fa fa-minus cursor-pointer" wire:click="decrease({{$loop->index+1}})"
                                    aria-hidden="true"></i>
                                <input wire:model="amount.{{$loop->index+1}}" type="text" value="0"
                                    class="w-8 pl-2 rounded-md focus:outline-none">
                                <i class="fa fa-plus cursor-pointer" wire:click="increase({{$loop->index+1}})"
                                    aria-hidden="true"></i>
                            </th>
                            <th>{{$price->price}}</th>
                            <th>{{$total_price[$loop->index+1]}}</th>
                        </tr>
                        @endif
                        @endforeach
                        <tr class="h-12">
                            <th class="w-1/2 text-left pl-2">
                                Total
                            </th>
                            <th></th>
                            <th></th>
                            <th>{{$total_combo}}</th>
                        </tr>
                    </tbody>
                </table>
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
                        {{numfmt_format_currency(numfmt_create( 'vn_VN', NumberFormatter::CURRENCY ), $total_ticket + $total_combo,"VND")}}
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
