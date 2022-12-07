<div class="bg-violet-50">
    <div class="container mx-auto flex justify-end py-2">
        @auth

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div class="mr-1">{{ Auth::user()->name }}</div>
                    <div class="bg-white w-[30px] h-[30px] flex items-center justify-center rounded-full">
                        <span class="iconify text-violet-600 text-base" data-icon="clarity:avatar-solid"></span>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Profile') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('dashboard')">
                            {{ __('Dashboard') }}
                </x-dropdown-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>

            </x-slot>
        </x-dropdown>
        @endauth
        @guest
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div class="bg-white w-[30px] h-[30px] flex items-center justify-center rounded-full">
                        <span class="iconify text-violet-600 text-base" data-icon="clarity:avatar-solid"></span>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('login')">
                            {{ __('Login') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('register')">
                            {{ __('Register') }}
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
        @endguest
    </div>
</div>
