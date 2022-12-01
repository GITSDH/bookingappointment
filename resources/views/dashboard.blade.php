<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 grid grid-cols-1 sm:grid-cols-4 gap-6">
        {{-- Item --}}
        <div class="overflow-hidden bg-orange-300 shadow-sm sm:rounded-lg px-6 py-8 flex justify-between items-center text-white">
            <div class="bg-orange-100 rounded w-16 h-16 flex justify-center items-center">
                <span class="iconify text-4xl" data-icon="fa6-solid:hospital"></span>
            </div>
            <div class="text-right">
                <h3 class="text-2xl font-bold">206</h3>
                <p>Total Hospital</p>
            </div>
        </div>
        {{-- Item --}}
        <div class="overflow-hidden bg-purple-300 shadow-sm sm:rounded-lg px-6 py-8 flex justify-between items-center text-white">
            <div class="bg-purple-100 rounded w-16 h-16 flex justify-center items-center">
                <span class="text-4xl font-bold">Rs</span>
            </div>
            <div class="text-right">
                <h3 class="text-2xl font-bold">206</h3>
                <p>Total Hospital</p>
            </div>
        </div>
        {{-- Item --}}
        <div class="overflow-hidden bg-green-300 shadow-sm sm:rounded-lg px-6 py-8 flex justify-between items-center text-white">
            <div class="bg-green-100 rounded w-16 h-16 flex justify-center items-center">
                <span class="iconify text-4xl" data-icon="humbleicons:switch-on"></span>
            </div>
            <div class="text-right">
                <h3 class="text-2xl font-bold">206</h3>
                <p>Total Hospital</p>
            </div>
        </div>
        {{-- Item --}}
        <div class="overflow-hidden bg-blue-300 shadow-sm sm:rounded-lg px-6 py-8 flex justify-between items-center text-white">
            <div class="bg-blue-100 rounded w-16 h-16 flex justify-center items-center">
                <span class="iconify text-4xl" data-icon="humbleicons:switch-off"></span>
            </div>
            <div class="text-right">
                <h3 class="text-2xl font-bold">206</h3>
                <p>Total Hospital</p>
            </div>
        </div>
    </div>
</x-app-layout>
