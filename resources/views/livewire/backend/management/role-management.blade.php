<div class="container xl:w-3/5">
    <div id='recipients' class="p-8 m-2 rounded shadow bg-white">
        <div class="grid grid-flow-col mt">
            @foreach ($staffRoles as $role)
            <a wire:click.prevent="changeRole({{$role->id}})"
                class="cursor-pointer capitalize p-1 border border-separate border-solid border-gray-600 bg-yellow-200 text-center">
                <span class="text-green-700">{{$role->role}} </span>
                @if ($currentRole->id==$role->id)
                <div class="text-red-700"> Selecting </div>
                @endif
            </a>
            @endforeach
            <div>
                <button class="bg-blue-300 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 m-2 rounded-full">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>New</span>
                </button>
            </div>
        </div>
        @foreach ($components as $component)
        <div class="grid grid-cols-5 mt-2">
            <div class="grid col-span-1 capitalize p-2">
                <label class="flex justify-start items-start">
                    {{$component->name}} Permission
                </label>
            </div>
            @foreach ($permissions as $permission)
            <div class="grid col-span-1 mt-2">
                <label for="{{$component->id}}{{$permission->id}}" class="flex justify-start items-start">
                    <div
                        class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                        <input id="{{$component->id}}{{$permission->id}}" name="{{$component->id}}{{$permission->id}}"
                            type="checkbox" @if (array_key_exists($permission->id,$accessibilities) &&
                        array_key_exists($component->id,$accessibilities[$permission->id]))
                        checked wire:click='unSelectPermision("{{$component->id}}","{{$permission->id}}")' @else
                        wire:click='selectPermision("{{$component->id}}","{{$permission->id}}")'
                        @endif class="opacity-0 absolute">
                        <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /></svg>
                    </div>
                    <div class="select-none capitalize">{{$permission->permission}}</div>
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
        <div wire:loading>
            Saving permission
        </div>
    </div>
</div>
