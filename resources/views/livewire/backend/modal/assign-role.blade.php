<div class="w-full flex items-center justify-center" x-data="modal()" x-cloak @open-assign-role.window="openModal()"
    @close-assign-role.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'fixed inset-0 z-10 flex items-center justify-center h-screen': open }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-6/12 md:max-w-md mx-auto rounded shadow-lg pt-4 text-left px-6 pb-0"
                x-ref="myModal" x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                <div class="text-red-600" wire:loading>
                    Saving changes.....
                </div>
                <form wire:submit.prevent='save'>
                    @csrf
                    <div class="w-full mx-auto">
                        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col w-1/2">
                                    <label class="leading-relaxed" for="staffId">Staff</label>
                                    <select wire:model="staffId" id="staffId" class="input-text" required>
                                        <option value="0">Select staff</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{$staff->id}}">{{$staff->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($currentStaff!=0)
                                <div class="flex flex-col w-1/2">
                                    <label class="leading-relaxed" for="role">Role</label>
                                    <select wire:model="role" id="role" class="input-text" required>
                                        <option value="0">Select role</option>
                                        @foreach($roles as $role)
                                        @if(!in_array($role->id,$staffRoles))
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="w-full mx-auto py-4">
                            <button type="submit"
                                class="cursor-pointer m-4 bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold py-2 px-4 rounded float-left">
                                Save
                            </button>
                            <a x-on:click="closeModal()"
                                class="cursor-pointer m-4 bg-gray-500 hover:bg-gray-700 focus:outline-none text-white font-bold py-2 px-4 rounded float-right">
                                Close
                            </a>
                        </div>
                    </div>
                </form>
                <!--Footer-->
            </div>

            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>
