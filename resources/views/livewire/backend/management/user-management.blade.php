<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="user" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Name
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Email
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Created At
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->name }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->email }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
