<div class="mx-auto w-full bg-gray-100 flex items-center justify-center h-0" x-data="modal()" x-cloak
    @open-login-form.window="openModal()" @close-login-form.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center h-full': open }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-1/3 md:max-w-md mx-auto rounded shadow-lg pt-4 text-left px-6 pb-0"
                x-ref="myModal" x-show="open" @click.away="closeModal()" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                <ul class="flex flex-row md:flex-col border-b border-orange-500 border-opacity-50 h-20 text-4xl">
                    <li class="md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
                        <a href="#" wire:click="changeTab('Login')">Login</a>
                    </li>
                    <li class="mx-5 py-2 ">
                        /
                    </li>
                    <li class="md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
                        <a href="#" wire:click="changeTab('Register')">Register</a>
                    </li>
                </ul>
                @if ($tab == 'Login')
                <form wire:submit.prevent="login" class="my-5">
                    @csrf
                    <div class="grid grid-rows-4 gap-0 space-y-2">
                        {{-- <i class="fa fa-user fa-1x" aria-hidden="true"></i> --}}
                        <div>
                            <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                            <input id="email" type="email" class="input-login" wire:model="email" required autofocus
                                placeholder="example@gmail.com">
                            </input>
                        </div>
                        <div class="mt-4">
                            <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                            <input id="password" type="password" wire:model="password" class="input-login" required
                                placeholder="************">
                        </div>
                        @if (session()->has('message'))
                        <div>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                <span class="block sm:inline">{{ session('message') }}</span>
                            </div>
                        </div>
                        @endif
                        <button type="submit"
                            class="text-lg font-bold text-white bg-orange-600 text-center w-full focus:outline-none focus:ring py-2 px-4">
                            {{ __('Login') }}
                        </button>
                        <div class="text-center w-full text-lg font-bold text-black m-0">Or</div>
                        <a href="{{ route('login_with_socialite', ['provider' => 'google']) }}"
                        {{-- <a wire:click="redirect('google')" --}}
                            class="text-center w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 focus:outline-none focus:ring">
                            Login with Google
                        </a>
                        <a href="{{ route('login_with_socialite', ['provider' => 'facebook']) }}"
                            class="text-center w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 focus:outline-none focus:ring">
                            Login with Facebook
                        </a>
                    </div>
                </form>
                @else
                <form wire:submit.prevent="register" class="my-5">
                    @csrf
                    <div class="grid grid-flow-row-dense gap-4">
                        <div>
                            <label for="name">{{ __('Name') }}</label>
                            <div>
                                <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                <input id="name" type="text" class="input-login" wire:model="name" required autofocus
                                    placeholder="Username">
                            </div>
                            @error('name') <span class="text-red-700">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            <div>
                                <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                <input id="email" type="email" class="input-login" wire:model="email" required
                                    placeholder="example@gmail.com">
                            </div>
                            @error('email') <span class="text-red-700">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="idCardNumber" class="">{{ __('ID Card Number') }}</label>
                            <div>
                                <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                <input id="idCardNumber" type="text" class="input-login" wire:model="idCardNumber" required
                                    placeholder="012345678912" autocomplete="off" maxlength="12">
                            </div>
                            @error('idCardNumber') <span class="text-red-700">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="phoneNumber" class="">{{ __('Phone Number') }}</label>
                            <div>
                                <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                <input id="phoneNumber" name="phoneNumber"type="text" class="input-login" wire:model="phoneNumber" required
                                    placeholder="0368-823-899" autocomplete="off" maxlength="13">
                            </div>
                            @error('phoneNumber') <span class="text-red-700">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="password" class="">{{ __('Password') }}</label>
                            <div>
                                <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                                <input id="password" type="password" class="input-login" wire:model="password" required
                                    placeholder="************" autocomplete="off">
                            </div>
                            @error('password') <span class="text-red-700">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div>
                                <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                                <input id="password-confirm" type="password" class="input-login"
                                    wire:model="confirmPassword" required placeholder="************">
                            </div>
                            @error('confirmPassword') <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (session()->has('message'))
                        <div>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                <span class="block sm:inline">{{ session('message') }}</span>
                            </div>
                        </div>
                        @endif
                        <button type="submit" class="btn-login">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                @endif

                <!-- content -->

                <!--Footer-->
            </div>

            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>
