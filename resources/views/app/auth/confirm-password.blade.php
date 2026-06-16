<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('app.password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-inputs.text
                name="password"
                :errors="$errors"
                label="{{ __('Password') }}"
                type="password"
                placeholder="••••••••"
                icon="fa-lock"
                styles="w-full"
                required
            />
        </div>

        <div class="flex justify-end mt-4">
            <x-buttons.submit text="{{ __('Confirm') }}" />
        </div>
    </form>
</x-guest-layout>
