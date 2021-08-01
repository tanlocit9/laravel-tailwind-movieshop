<div class="grid grid-cols-4 gap-4">
    @if($tickets)
    @forelse ($tickets as $ticket)
    <div
        class="relative flex flex-col rounded-xl w-full max-w-xs bg-gray-400 shadow-md m-4 pt-4 items-center justify-center">
        <div class="py-4">
            <p class="mt-4 flex items-center justify-center text-4xl leading-none font-bold text-gray-900">
                {{numfmt_format_currency(numfmt_create( 'vn_VN', NumberFormatter::CURRENCY ), $ticket->total_price,"VND")}}
            </p>
            <p class="mt-2 flex items-center justify-center text-md leading-none font-normal text-gray-700">
                {{$ticket->schedule()->date}}, {{$ticket->calendar()->time_start}}</p>
        </div>
        <div class="flex flex-row w-full justify-center items-center">
            <div class="rounded-full bg-gray-100" style="margin-left: -10px;height: 25px; width:25px;"></div>
            <div class="border-t-2 border-gray-400 border-dashed w-full"></div>
            <div class="rounded-full bg-gray-100" style="margin-right: -10px;height: 25px; width:25px;"></div>
        </div>
        @foreach ($ticket->prices as $price)
        <div class="flex flex-row w-full px-4 pt-2">
            <div class="flex flex-col justify-center w-full">
                <p class="text-gray-700 font-bold">{{$price->name}}</p>
            </div>
            <div class="flex flex-col justify-center w-full items-end">
                <p class="text-gray-900 font-bold text-xl">
                    {{numfmt_format_currency(numfmt_create( 'vn_VN', NumberFormatter::CURRENCY ), $price->price,"VND")}}
                </p>
            </div>
        </div>
        @endforeach
        <div class="border-t-2 border-gray-300 border-separate w-full"></div>
        <div class="flex flex-row w-full p-4 justify-between">
            <p class="text-gray-700 font-semibold">Status</p>
            <p class="text-gray-900 font-bold text-xl">{{$ticket->status->status}}</p>
        </div>

    </div>
    @empty
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>

                            <p>the page you are looking for not avaible!</p>

                            <a href="" class="link_404" wire:click="$emit('changeTab','index')">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforelse
    @endif
</div>
