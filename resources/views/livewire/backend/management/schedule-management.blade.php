<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <button wire:click.prevent="$refresh"
            class="text-center mb-3 bg-blue-700 hover:bg-blue-800 text-black font-bold py-2 px-4 focus:outline-none rounded-2xl">
            Refresh
        </button>
        <button wire:click="$emit('openScheduleAddModal')" class="text-center my-3 bg-blue-700 hover:bg-blue-800 text-black font-bold py-2 px-4 focus:outline-none rounded-2xl">Add Schedule</button>
        <button wire:click="deleteCurrentDate" class="text-center my-3 bg-blue-700 hover:bg-blue-800 text-black font-bold py-2 px-4 focus:outline-none rounded-2xl">Delete selected Schedule</button>
        <button wire:click="$emit('openCalendarAddModal','{{$currentDate}}')" class="text-center my-3 bg-blue-700 hover:bg-blue-800 text-black font-bold py-2 px-4 focus:outline-none rounded-2xl">Add Calendar for selected schedule</button>
        <h1 class="block">Schedules</h1>
        <div class="grid grid-cols-7 overflow-auto">
            @foreach ($schedules as $k=>$item)
            <a wire:click.prevent="selectDate('{{$k}}')"
                class="cursor-pointer capitalize p-1 border border-separate border-solid border-gray-600 bg-yellow-200 text-center">
                <span class="text-green-700">{{$k}} </span>
                @if ($currentDate==$k)
                <div class="text-red-700"> Selecting </div>
                @endif
            </a>
            @endforeach
        </div>
        <div>
            <h1 class="block">Calendars</h1>
            <table id="schedule" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            date
                        </th>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            movie
                        </th>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            theater
                        </th>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            time start
                        </th>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            room
                        </th>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            Slot remain
                        </th>
                        <th
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($calendars as $item)
                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->schedule->date }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->schedule->movie->title }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->schedule->theater->theater_name }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->time_start}}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->getRoomName()}}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->slot_remain}}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $item->getStatusName()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
