<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="movie" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        title
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        duration
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        release date
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        country
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        age limit
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Avg rate
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Main genre
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->title }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->duration }}</td>
                    <td class=" px-6 py-3 whitespace-nowrap">{{ $item->release_date }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        {{ Illuminate\Support\Str::limit($item->country->country_name, 18, $end='...') }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $item->age_limit }}</td>
                    <td class=" px-6 py-3 whitespace-nowrap">
                        {{ $item->avg_rate() ? number_format($item->avg_rate(), 2) : 'Not Rated' }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        {{ $item->main_genre->first()->genre_name }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        @foreach ($permissions as $permission)
                        @switch($permission->permission)
                        @case('create')
                        @if(Accessibility::hasAuthorize($permission->id,$accessibilities))
                        <button wire:click="$emit('openMovieEditModal',{{$item->id}})"
                            class="bg-yellow-300 hover:bg-yellow-200 inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 rounded-full focus:outline-none">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </button>
                        @endif
                        @break
                        @case('update')

                        @break
                        @case('read')

                        @break
                        @case('delete')
                        @if(Accessibility::hasAuthorize($permission->id,$accessibilities))
                        <button wire:click="$emit('openMovieEditModal',{{$item->id}})"
                            class="bg-red-500 hover:bg-red-400 inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 rounded-full focus:outline-none ">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        @endif
                        @break
                        @default

                        @endswitch
                        @endforeach
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
