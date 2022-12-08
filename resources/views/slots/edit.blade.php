<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('specialities.index')" :active="request()->routeIs('specialities.index')">
                {{ __('All Specialities') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <h2 class="font-bold">Create New Slot</h2>
        <form method="POST" action="{{ route('slots.update',$slot->id) }}">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$slot->name}}" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4 flex gap-4">

                <div>
                    <x-input-label for="start" :value="__('Start Time')" />

                    <x-text-input id="start" class="block mt-1 w-full" type="time" name="start" value="{{$slot->start}}" required autofocus />

                    <x-input-error :messages="$errors->get('start')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="end" :value="__('End Time')" />

                    <x-text-input id="end" class="block mt-1 w-full" type="time" name="end" value="{{$slot->end}}" required autofocus />

                    <x-input-error :messages="$errors->get('end')" class="mt-2" />
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update Slot') }}
                </x-primary-button>
            </div>
        </form>
    </div>


</x-app-layout>
