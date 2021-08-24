<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <button wire:click="$refresh"
            class="text-center my-3 bg-blue-700 hover:bg-blue-800 text-black font-bold py-2 px-4 focus:outline-none rounded-2xl">Refresh</button>
        <button wire:click="$emit('openAssignRoleModal')"
            class="text-center my-3 bg-blue-700 hover:bg-blue-800 text-black font-bold py-2 px-4 focus:outline-none rounded-2xl">Assign Role
            </button>

        <table id="staff" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
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
                        status
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->name }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->email }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->getStatus() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
