<form action="{{route('user_add')}}" method="POST">
    @csrf
    {{-- <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10"> --}}
    <div class="max-w-md mx-auto">
        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
            <div class="flex flex-col">
                <label class="leading-relaxed">user name</label>
                <input type="text" name="name"class="input-text sm:text-sm" placeholder="User name" required value="{{old('user_name')}}" autofocus>
            </div>
            <div class="flex flex-col">
                <label class="leading-relaxed">Email</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                    <svg class="absolute pl-1 pt-2 w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <input required type="text" name="email" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-relaxed">Password</label>
                <input type="password" name="password" class="input-text sm:text-sm" placeholder="********" required>
            </div>
            <div class="flex flex-col">
                <label class="leading-relaxed">Confirm Password</label>
                <input type="password" name="password" class="input-text sm:text-sm" placeholder="********" required>
            </div>
            <div class="flex flex-col">
                <label class="leading-relaxed" for="role">Default role</label>
                <input readonly type="text" value="admin" name="role" id="role"class="input-text sm:text-sm">
            </div>
            <div class="pt-4 flex items-center space-x-4">
                <div id="modal-close" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none cursor-pointer">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                </div>
                <button type="submit" class="modal-create">Create</button>
            </div>
        </div>
    </div>
</form>
