<div class="flex flex-row md:flex-col items-center mr-5">
    <ul class="flex flex-row md:flex-col items-center">
        {{-- <input class="text-red-500" wire:model="something"> --}}
        @guest
            <li class="nav-item">
                <a class="nav-link cursor-pointer" wire:click="openLoginForm()">{{ __('Login') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <div>
                    <a class="" href="#" >
                        <i class="fa fa-user-circle fa-1x" aria-hidden="true"></i>
                        Hi, {{ Auth::user()->name }}
                    </a>

                    @if (Auth::user()->role_id==1)

                        <a class="mx-5" href="{{ route('admin') }}">{{ __('Admin') }}</a>
                    @endif

                        <a class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </li>
        @endguest
    <ul/>
</div>

