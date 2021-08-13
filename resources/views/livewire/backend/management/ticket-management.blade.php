<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="ticket" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        User name
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Total price
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Pay mode
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Movie
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Theater
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Status
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->user->name }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        {{numfmt_format_currency(numfmt_create( 'vn_VN', NumberFormatter::CURRENCY ),  $item->total_price ,"VND")}}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->payMode->mode }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->movie()->title }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->theater()->theater_name }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->status->status }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <button wire:click="$emit('openTicketEditModal',{{$item->id}})"
                            class="bg-yellow-200 inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 rounded-full focus:outline-none hover:bg-gray-200">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
