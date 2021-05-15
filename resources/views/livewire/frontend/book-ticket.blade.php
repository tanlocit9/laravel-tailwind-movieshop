<div class="text-lg mx-32 mt-3">
    <div class="grid grid-cols-4">
        <div class="col-span-3 bg-orange-700">
            <h1 class="mx-2 mt-3">CHOOSE TICKET / FOOD</h1>
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
                            @if($price->type_id==2)
                            <tr class="h-12">
                                <th class="w-1/2 text-left pl-2">
                                    {{$price->name}} ({{$price->description}})
                                </th>
                                <th>
                                    <i class="fa fa-minus cursor-pointer" wire:click="decrease({{$loop->index+1}})" aria-hidden="true"></i>
                                    <input wire:model="amount.{{$loop->index+1}}" type="text" value="0" class="w-8 pl-2 rounded-md focus:outline-none">
                                    <i class="fa fa-plus cursor-pointer" wire:click="increase({{$loop->index+1}})" aria-hidden="true"></i>
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
                            <th>Total (VND)</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm bg-yellow-400 text-black">
                        @foreach ($prices as $price)
                            @if($price->type_id==3)
                            <tr class="h-12">
                                <th class="w-1/2 text-left pl-2">
                                    {{$price->name}} ({{$price->description}})
                                </th>
                                <th>
                                    <i class="fa fa-minus cursor-pointer" wire:click="decrease({{$loop->index+1}})" aria-hidden="true"></i>
                                    <input wire:model="amount.{{$loop->index+1}}" type="text" value="0" class="w-8 pl-2 rounded-md focus:outline-none">
                                    <i class="fa fa-plus cursor-pointer" wire:click="increase({{$loop->index+1}})" aria-hidden="true"></i>
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
        <div class="col-span-1 mx-5 ">
            <div class="bg-gray-700 text-center ">
                <img src="{{asset('storage/posters')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-24 mx-auto">
                {{$movie->title}}
            </div>
        </div>

    </div>
</div>
