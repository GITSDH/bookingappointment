<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('subscriptions.index')" :active="request()->routeIs('subscriptions.index')">
                {{ __('All Subscriptions') }}
            </x-nav-link>
            <x-nav-link :href="route('subscriptions.create')" :active="request()->routeIs('subscriptions.create')">
                {{ __('Add New Subscriber') }}
            </x-nav-link>
            <x-nav-link :href="route('users.create')" :active="request()->routeIs('users.create')">
                {{ __('Add New Admin') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 ">
        <form method="POST" action="{{ route('subscriptions.store') }}">
            @csrf

            <div class="mt-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Select Admin User</label>
                <select id="role" name="role" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                  @foreach ($admins as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="mt-4">
                <h2 class="font-bold text-xl">Modules</h2>
                <Ul class="my-2">
                    <li class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" checked>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="candidates" class="font-medium text-gray-700">Booking and Appointment</label>
                        </div>
                    </li>
                </Ul>
            </div>
            <hr>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Add Subscriber') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
