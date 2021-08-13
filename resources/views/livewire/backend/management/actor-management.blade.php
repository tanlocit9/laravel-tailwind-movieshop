<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="actor" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Name
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Gender
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr class="capitalize">
                    <td class="px-6 py-3 whitespace-nowrap">{{$item->full_name}}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                    @if($item->gender) Male @else Female @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
