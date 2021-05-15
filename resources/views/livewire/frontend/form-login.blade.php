<div class="mx-auto w-full bg-gray-100 flex items-center justify-center h-0" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak @open-login-form.window="showModal = true">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)":class="{ 'absolute inset-0 z-10 flex items-center justify-center h-full': showModal }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-1/3 md:max-w-md mx-auto rounded shadow-lg pt-4 text-left px-6 pb-0" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
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
                    @if($tab=='Login')
                        <form method="POST" action="{{ route('login') }}" class="my-5">
                            @csrf
                            <div class="grid grid-rows-4 gap-0 space-y-3">
                                {{-- <i class="fa fa-user fa-1x" aria-hidden="true"></i> --}}
                                <div>
                                    <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                    <input id="email" type="email"
                                    class="input-login"
                                    name="email" value="{{ old('email') }}"
                                    required
                                    autofocus
                                    placeholder="example@gmail.com">
                                    </input>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                                    <input id="password" type="password" name="password"
                                    class="input-login" required placeholder="************">
                                </div>
                                <button type="submit" class="text-lg font-bold text-white bg-orange-600 text-center w-full focus:outline-none focus:shadow-outline py-2 px-4">
                                    {{ __('Login') }}
                                </button>
                                {{-- <div class="mt-4 mx-6 rounded-full text-center">
                                    @if (Route::has('password.request'))
                                        <a class="text-lg text-red-500 " href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div> --}}
                                <div class="text-center w-full text-lg font-bold text-black m-0">Or</div>
                                <a href="{{ route('login_with_socialite',['provider'=>'google']) }}"
                                    class="text-center w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">
                                    Login with Google
                                </a>
                                <a href="{{ route('login_with_socialite',['provider'=>'facebook']) }}"
                                    class="text-center w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                                    >
                                    Login with Facebook
                                </a>
                            </div>
                        </form>
                        @else
                            <form method="POST" action="{{ route('register') }}" class="my-5">
                                @csrf
                                <div class="grid grid-flow-row-dense gap-4">
                                    <div>
                                        <label for="name">{{ __('Name') }}</label>
                                        <div>
                                            <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                            <input id="name" type="text" class="input-login" name="name" value="{{ old('name') }}" required autofocus placeholder="Loc ne">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                        <div>
                                            <i class="fa fa-user fa-1x absolute pt-2 pl-3" aria-hidden="true"></i>
                                            <input id="email" type="email" class="input-login" name="email" value="{{ old('email') }}" required placeholder="example@gmail.com">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="password" class="">{{ __('Password') }}</label>
                                        <div>
                                            <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                                            <input id="password" type="password" class="input-login" name="password" required placeholder="************">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <div>
                                            <i class="fa fa-lock absolute pt-2 pl-3" aria-hidden="true"></i>
                                            <input id="password-confirm" type="password" class="input-login" name="password_confirmation" required placeholder="************">
                                        </div>
                                    </div>
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

