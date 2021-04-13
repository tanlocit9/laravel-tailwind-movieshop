<div x-show="show" class="mx-auto w-full bg-gray-100 flex items-center justify-center h-screen" x-data="{ 'show': false }" @keydown.escape="show = false" x-cloak @open-login-form.window="show = true">

    <section class="flex flex-wrap p-4 h-full items-center"  >
        <!--Overlay-->
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)":class="{ 'absolute inset-0 z-10 flex items-center justify-center': show }">
            <!--Dialog-->
            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="show" @click.away="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                <ul class="flex flex-row md:flex-col border-b border-orange-500 border-opacity-50 h-10">
                    <li class="md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
                        <a href="#" wire:click="changeTab('Login')">Login</a>
                    </li>
                    <li class="ml-16 md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
                        <a href="#" wire:click="changeTab('Register')">Register</a>
                    </li>
                </ul>

                <!-- content -->

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="alert('Additional Action');">Action</button>
                    <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="show = false">Close</button>
                </div>


            </div>
            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>

