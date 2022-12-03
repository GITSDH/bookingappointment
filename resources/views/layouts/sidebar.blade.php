<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center" id="siteLogo">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </a>
            </div>
            <!-- Hamburger -->
            <div class="-mr-2 hidden sm:flex items-center" id="sidemenutoggle">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" id="toggleIcon" width="1em" height="1em"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m15 4l-8 8l8 8" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
<div class="sidenav">
    <x-sidenav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <span class="iconify" data-icon="mingcute:dashboard-2-line"></span>
        <p class="sidelinktext">Dashboard</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
        <span class="iconify" data-icon="ph:users"></span>
        <p class="sidelinktext">Users</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('subscriptions.index')" :active="request()->routeIs('subscriptions.*')">
        <span class="iconify" data-icon="mdi:subscriber-identification-module-outline"></span>
        <p class="sidelinktext">Subscriptions</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('locations.index')" :active="request()->routeIs('locations.*')">
        <span class="iconify" data-icon="material-symbols:location-on-outline"></span>
        <p class="sidelinktext">Locations</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('hospitals.index')" :active="request()->routeIs('hospitals.*')">
        <span class="iconify" data-icon="carbon:hospital"></span>
        <p class="sidelinktext">Facilities</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('doctors.index')" :active="request()->routeIs('doctors.*')">
        <span class="iconify" data-icon="maki:doctor"></span>
        <p class="sidelinktext">Doctors</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.*')">
        <span class="iconify" data-icon="fluent:key-20-regular"></span>
        <p class="sidelinktext">Permissions</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')">
        <span class="iconify" data-icon="fluent:phone-key-24-regular"></span>
        <p class="sidelinktext">Roles</p>
    </x-sidenav-link>
    <x-sidenav-link :href="route('appoinments.index')" :active="request()->routeIs('appoinments.*')">
        <span class="iconify" data-icon="icon-park-outline:appointment"></span>
        <p class="sidelinktext">Appointments</p>
    </x-sidenav-link>
</div>
