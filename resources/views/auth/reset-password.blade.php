<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST"
            action="{{ route('password.update') }}">
            @csrf

            <input type="hidden"
                name="token"
                value="{{ $request->route('token') }}">
            <input type="hidden"
                name="email"
                value="{{ $request->email }}">
            <div class="block">
                <x-label for="email"
                    value="{{ __('Corre Electrónico') }}" />
                <x-input id="email"
                    class="block mt-1 w-full"
                    :disabled="true"
                    type="email"
                    name="email"
                    :value="old('email', $request->email)" />
            </div>

            <div class="mt-4">
                <x-label for="password"
                    value="{{ __('Contraseña') }}" />
                <x-input id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation"
                    value="{{ __('Confirmar contraseña') }}" />
                <x-input id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Restablecer Contraseña') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
