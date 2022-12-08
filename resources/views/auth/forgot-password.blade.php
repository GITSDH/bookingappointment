<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h2 class="font-bold text-2xl">Ops!</h2>
            <p>Input your email</p>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="sm:mb-[350px]">
            @csrf

            <!-- Email Address -->
            <div class="relative">
                <x-text-input id="email" class="block mt-1 w-full rounded-full bg-violet-100 pl-9 text-violet-500" type="email" name="email" :value="old('email')" required autofocus />
                <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-violet-500" data-icon="eva:email-fill"></span>


                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
