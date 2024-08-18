<x-guest-layout>

    <x-auth-card>

        <x-slot name="logo">

        </x-slot>


        <div class="font-bold text-center text-xl">
            <h1>Sign To Your Account</h1>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"/>
                <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required
                         autofocus/>
            </div>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <!-- Password -->
            <div class="mt-6">
                <x-label for="password" :value="__('Password')"/>
                <x-input id="password" class="block mt-2 w-full" type="password" name="password" required
                         autocomplete="current-password"/>
            </div>


            <div class="flex block justify-between items-center">
                <!-- Remember Me -->
                <div class="block mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray text-green shadow-sm focus:border-green focus:ring focus:ring-green-light focus:ring-opacity-50"
                               name="remember">
                        <span class="ml-2 text-sm text-black">
                        {{ __('Remember me') }}
                     </span>
                    </label>
                </div>

                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-green text-sm hover:text-dark" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

            </div>

            <div>
                <x-button class="bg-green w-full mt-6">
                    {{ __('Log in') }}
                </x-button>
            </div>

            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
