<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <table id="movie_actor" class="display cell-border min-w-full divide-y divide-gray-200 normal-case">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        title
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        main actor
                    </th>
                    <th
                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                        sub actor
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">
                        {{$item->title}}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        @foreach($item->main_actor as $actor)
                        @if ($loop->last)
                        {{$actor->full_name}}.
                        @else {{$actor->full_name}},
                        @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        @foreach($item->sub_actor as $actor)
                        @if ($loop->last)
                        {{$actor->full_name}}.
                        @else {{$actor->full_name}},
                        @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
