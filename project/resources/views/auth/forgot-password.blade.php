<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo id="logo" />
            </a>
        </x-slot>

        <div class="mb-4 small text-secondary">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-3" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="d-flex align-items-center justify-content-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
