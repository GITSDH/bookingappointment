<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h2 class="font-bold text-2xl">Welcome Back!</h2>
            <p>Sign In to continue</p>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="relative">
                <x-text-input id="email" class="block mt-1 w-full rounded-full bg-violet-100 pl-9 text-violet-500"
                    type="email" name="email" :value="old('email')" required autofocus />
                <span class="iconify absolute left-4 top-[13px] text-violet-500" data-icon="eva:email-fill"></span>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <x-text-input id="password" class="block mt-1 w-full rounded-full bg-violet-100 pl-9 text-violet-500"
                    type="password" name="password" required autocomplete="current-password" />
                <span class="iconify absolute left-4 top-[13px] text-violet-500"
                    data-icon="material-symbols:vpn-key-rounded"></span>


                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flex justify-between">

                <!-- Remember Me -->
                <div class="block my-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-violet-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-900">{{ __('Remember me') }}</span>
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-900 hover:text-gray-900 mt-4" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <x-primary-button class="w-full mb-4">
                {{ __('Sign in') }}
            </x-primary-button>

            <div class="text-center">
                <p>Don’t have an account?<a class="text-sm text-violet-500 hover:text-violet-400 mt-4 ml-4"
                        href="{{ route('register') }}">Sign up!</a></p>
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
