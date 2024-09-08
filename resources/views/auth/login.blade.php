<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div x-data="{ show: true }" x-show="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm mx-auto">
                <h2 class="text-xl font-bold mb-4">Status</h2>
                <p class="text-gray-700 mb-4">{{ session('status') }}</p>
                <button @click="show = false" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>
    @endif

        <form method="POST"
            action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email"
                    value="{{ __('Correo Electrónico') }}" />
                <x-input id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password"
                    value="{{ __('Contraseña') }}" />
                <x-input id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me"
                    class="flex items-center">
                    <x-checkbox id="remember_me"
                        name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between  mt-4">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                    class=" text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">¿No tienes cuenta? Click aqui</a>
                @endif
                <div class="flex items-center   ">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-button class="ms-4">
                        {{ __('Iniciar sesión') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
