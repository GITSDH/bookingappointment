<div class="bg-violet-500">
    <div class="container mx-auto flex justify-start sm:gap-8">
            <x-client-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
            <x-client-nav-link :href="route('bookAppointment')" :active="request()->routeIs('bookAppointment')">
                {{ __('Book Appoinment') }}
            </x-nav-link>
            <x-client-nav-link :href="route('myappoinment')" :active="request()->routeIs('myappoinment')">
                {{ __('My Appoinment') }}
            </x-nav-link>
            <x-client-nav-link :href="route('servieceDetails')" :active="request()->routeIs('servieceDetails')">
                {{ __('Service Description') }}
            </x-nav-link>
    </div>
</div>

