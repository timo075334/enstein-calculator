<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 rounded-md border border-green-300 bg-green-50 px-3 py-2 text-sm font-medium text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <form id="reset-password-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button id="reset-password-submit">
                <span id="reset-password-label">{{ __('Email Password Reset Link') }}</span>
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('reset-password-form');
            const submitButton = document.getElementById('reset-password-submit');
            const buttonLabel = document.getElementById('reset-password-label');

            if (!form || !submitButton || !buttonLabel) {
                return;
            }

            form.addEventListener('submit', function () {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-60', 'cursor-not-allowed');
                buttonLabel.textContent = 'Sending...';
            });
        });
    </script>
</x-guest-layout>
