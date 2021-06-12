<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="movie_genre" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Movie name</th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Main Genre</th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Sub Genres</th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->main_genre->first()->genre_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @forelse($item->sub_genre as $genre)
                                @if ($loop->last)
                                    {{ $genre->genre_name }}.
                                @else
                                    {{ $genre->genre_name }},
                                @endif
                            @empty
                                Movie doesn't have sub Genres
                            @endforelse
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Modify</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
