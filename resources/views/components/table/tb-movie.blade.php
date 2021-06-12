<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="movie" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        title
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        duration
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        description
                    </th>

                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        release date
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        country
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        age limit
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Avg rate
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Main genre
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->duration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->release_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->country->country_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->age_limit }}</td>
                        <td class="line-clamp-2 hover:line-clamp-none mx-auto hover:text-red-500 break-normal px-6 py-4 whitespace-nowrap"">
                    {{ $item->description }}
                </td>
                <td class=" px-6 py-4 whitespace-nowrap">
                            {{ $item->avg_rate() ? number_format($item->avg_rate(), 2) : 'Not Rated' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $item->main_genre->first()->genre_name }}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
