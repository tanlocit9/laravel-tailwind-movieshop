<div class="relative m-2 rounded shadow bg-gray-100 flex-1 p-6 md:mt-16 h-full">
    <!-- congrats & summary -->
    <div class="grid grid-cols-3 lg:grid-cols-1 gap-5">
        <!-- congrats -->
        <div class="rounded bg-white border border-gray-300 col-span-1 h-auto">
            <div class="pt-6 h-full flex flex-col justify-between">
                <div>
                    <h1 class="border-b p-6 text-lg font-bold tracking-wide">name of the theater</h1>
                    <p class="text-gray-600 mt-2">Most viewed this month</p>
                </div>

                <div class="flex flex-row mt-10 items-end">
                    <div class="flex-1">
                        <h1 class="font-extrabold text-4xl text-teal-400">{total viewed}</h1>
                        <p class="mt-3 mb-4 text-xs text-gray-500">{percent overall}</p>
                        <a href="#" class="text-center capitalize bg-teal-400 block pt-2 pb-2 pl-5 pr-5 rounded text-white transition-all py-3">
                            view time
                        </a>
                    </div>
                    <div class="flex-1 ml-10 w-32 h-32 lg:w-auto lg:h-auto overflow-hidden">
                        <img class="object-cover" src="{{ asset('backend/img/congrats.svg') }}" alt="movie poster">
                    </div>
                </div>
            </div>
        </div>
        <!-- end congrats -->
        <div class="rounded bg-white border border-gray-300 p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">
            <div class="w-1/3 h-2/3 lg:w-full border-r border-gray-200">
                <!-- top -->
                <div class="p-5 border-b border-gray-200">
                    <h2 class="font-bold text-lg mb-6">Top Views</h2>
                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 1}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">250 Views</span>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 2}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">250 Views</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 3}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">250 Views</span>
                        </div>
                    </div>
                </div>
                <!-- end top -->
                <div class="p-5 ">
                    <h2 class="font-bold text-lg mb-2">Total View</h2>
                    <strong class="text-teal-400 font-extrabold text-xl">1999 Views</strong>

                    <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                        <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
                    </div>
                    <!-- bottom -->

                    <!-- end bottom -->
                </div>

            </div>
            <!-- left -->
            <div class="w-1/3 lg:w-full border-r border-gray-200">
                <!-- top -->
                <div class="p-5 border-b border-gray-200">
                    <h2 class="font-bold text-lg mb-6">Top Revenue</h2>

                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 1}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">250 Views</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 2}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">250 Views</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 3}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">250 Views</span>
                        </div>
                    </div>
                </div>
                <!-- end top -->
                <!-- bottom -->

                <div class="p-5">
                    <h2 class="font-bold text-lg mb-2">Total Revenue</h2>
                    <strong class="text-teal-400 font-extrabold text-xl">$82,950.96</strong>

                    <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                        <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
                    </div>
                </div>
                <!-- end bottom -->
            </div>
            <!-- end left -->
            <!-- left -->
            <div class="w-1/3 lg:w-full">

                <!-- top -->
                <div class="p-5 border-b border-gray-200">
                    <h2 class="font-bold text-lg mb-6">Top Rating</h2>
                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 1}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">5 stars</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 2}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">5 stars</span>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between mb-3">
                        <div class="">
                            <h4 class="text-gray-600 font-thin">{Movie 3}</h4>
                            <p class="text-gray-400 text-xs font-hairline">{note}</p>
                        </div>
                        <div class="text-sm font-medium">
                            <span class="text-red-500">5 stars</span>
                        </div>
                    </div>
                </div>
                <!-- end top -->
                <!-- bottom -->
                <div class="p-5">
                    <h2 class="font-bold text-lg mb-2">Highest Genre Rated</h2>
                    <strong class="text-teal-400 font-extrabold text-xl">Action</strong>

                    <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                        <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
                    </div>
                </div>
                <!-- end bottom -->

            </div>
            <!-- end left -->
        </div>
    </div>
    <!-- end congrats & summary -->
</div>
</div>
