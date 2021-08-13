<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="theater" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">theater Name</th>
                            <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">address</th>
                            <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">phone</th>
                            <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">manager</th>
                            <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">manager phone</th>
                            <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">staff</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap">{{$item->theater_name}}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{$item->theater_address}}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{$item->theater_phone}}</td>
                        <td class="px-6 py-3 whitespace-nowrap">Việt Nam</td>
                        <td class="px-6 py-3 whitespace-nowrap">16</td>
                        <td class="px-6 py-3 whitespace-nowrap">16</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
