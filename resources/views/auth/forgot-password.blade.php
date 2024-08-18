<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">

        </x-slot>

        <div class="font-bold text-center text-xl">
            <h1>Reset Password</h1>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"/>
                <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')"/>
            </div>

            <div class="w-full mt-6">
                <x-button>
                    {{ __('Password Reset instruction') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
