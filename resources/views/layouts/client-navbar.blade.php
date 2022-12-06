<div class="bg-violet-500">
    <div class="container mx-auto flex justify-start">
            <x-client-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
            <x-client-nav-link :href="route('permissions.create')" :active="request()->routeIs('permissions.create')">
                {{ __('Add New Permission') }}
            </x-nav-link>
    </div>
</div>

