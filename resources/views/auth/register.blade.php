<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST"
            action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="nombre"
                    value="{{ __('Nombre') }}" />
                <x-input id="nombre"
                    class="block mt-1 w-full"
                    type="text"
                    name="nombre"
                    :value="old('nombre')"
                    required
                    autofocus
                    autocomplete="nombre" />
            </div>

            <div class="mt-4">
                <x-label for="email"
                    value="{{ __('Correo Electrónico') }}" />
                <x-input id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username" />
            </div>
            <div>
                <x-label for="rol_id"
                    :value="__('Seleccione el Rol')" />
                <select id="rol_id"
                    name="rol_id"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">-- Seleccione --</option>
                    @foreach ($roles as $empresa)
                        @if ($empresa->id != 1 && $empresa->id != 5)
                            <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                        @endif
                    @endforeach
                </select>
                <x-input-error class="mt-2"
                    for="rol_id" />
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
                    value="{{ __('Confirmar la contraseña') }}" />
                <x-input id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms"
                                id="terms"
                                required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">


                <x-button class="ms-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
