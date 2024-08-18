<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="font-bold text-center text-xl">
            <h1>Get Started</h1>
        </div>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="request('email') ?? old('email')" required />
            </div>


            <!-- Password -->
            <div class="mt-6">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-2 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>


            <!-- Confirm Password -->
            <div class="mt-6">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-2 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-green" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <x-button class="bg-green mt-6 w-full">
                {{ __('Register') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>