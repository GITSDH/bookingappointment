<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h2 class="font-bold text-2xl">Welcome!</h2>
            <p>Sign UP to continue</p>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-text-input id="name" class="block mt-1 w-full rounded-full bg-violet-100 text-violet-500" type="text" name="name" :value="old('name')" required autofocus placeholder="Name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4 relative">
                <x-text-input id="email" class="block mt-1 w-full rounded-full bg-violet-100 pl-9 text-violet-500" type="email" name="email" :value="old('email')" required placeholder="email@example.com"/>
                <span class="iconify absolute left-4 top-[13px] text-violet-500" data-icon="eva:email-fill"></span>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4 relative">

                <x-text-input id="password" class="block mt-1 w-full rounded-full bg-violet-100 pl-9 text-violet-500"
                                type="password"
                                name="password"
                                required autocomplete="new-password"/>
                                <span class="iconify absolute left-4 top-[13px] text-violet-500"
                    data-icon="material-symbols:vpn-key-rounded"></span>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 relative">

                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-full bg-violet-100 pl-9 text-violet-500"
                                type="password"
                                name="password_confirmation" required />
                <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-violet-500"
                    data-icon="material-symbols:vpn-key-rounded"></span>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button class="w-full mt-4">
                {{ __('Register') }}
            </x-primary-button>
            <div class="text-center mt-4">
                <p>Already registered?<a class="text-sm text-violet-500 hover:text-violet-400 mt-4 ml-4"
                        href="{{ route('login') }}">Sign In!</a></p>
            </div>
            <div class="flex justify-between my-8 items-center">
                <hr class="h-[2px] bg-gray-500 w-2/5">
                <span class="font-bold text-violet-500">OR</span>
                <hr class="h-[2px] bg-gray-500 w-2/5">
            </div>
            <div class="flex items-center flex-col">
                <button
                    class="flex items-center gap-3 font-bold border border-violet-500 p-3 rounded-full hover:text-violet-500">
                    <span class="iconify text-xl" data-icon="fluent:fingerprint-24-filled"></span>
                    <span>Sign in with UAE PASS</span>
                </button>
                <p class="text-center mt-5 text-lg text-violet-500">A single trusted digital identity for all citizens,
                    residents and visitiors</p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
