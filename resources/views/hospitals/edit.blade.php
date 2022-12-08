<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('hospitals.index')" :active="request()->routeIs('hospitals.index')">
                {{ __('All Hospitals') }}
            </x-nav-link>
            <x-nav-link :href="route('hospitals.create')" :active="request()->routeIs('hospitals.create')">
                {{ __('Add New Hospital') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 ">
        <form method="POST" action="{{ route('hospitals.update',$hospital->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-3 gap-4">
                <!-- Name -->
                <div class="col-span-2">
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$hospital->name}}" required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="logo" :value="__('Logo')" />
                    <x-file-input type="file" id="logo" name="logo" :value="old('logo')"  autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>


            <div class="mt-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select id="type" name="type" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="1" {{$hospital->type == 1 ? 'selected' : ''}}>Clinic</option>
                    <option value="2" {{$hospital->type == 2 ? 'selected' : ''}}>Hospital</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select id="location" name="location" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                  @foreach ($locations as $item)
                    <option value="{{$item->id}}" {{$hospital->location_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                  @endforeach
                </select>
            </div>

            <!-- Details -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-area id="description" name="description">{{$hospital->description}}</x-text-area>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Updated Hospital') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
