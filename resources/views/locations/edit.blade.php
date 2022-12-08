<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('locations.index')" :active="request()->routeIs('locations.index')">
                {{ __('All Locations') }}
            </x-nav-link>
            <x-nav-link :href="route('locations.create')" :active="request()->routeIs('locations.create')">
                {{ __('Add New Location') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 ">
        <form method="POST" action="{{ route('locations.update',$location->id) }}">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$location->name}}" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Update Location') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
