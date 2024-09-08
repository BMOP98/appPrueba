<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea nuevo') }} Vehiculo
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"> <a class="text-blue-400 underline" href="{{ route('dashboard') }}">Dashboard</a> / <a class="text-blue-400 underline"
    href="{{ route('vehiculos.index') }}">Vehiculos</a> / {{ __('Nuevo Vehiculo') }}</div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Crea nuevo') }} Vehiculo</h1>
                            <p class="mt-2 text-sm text-gray-700">Agrega un nuevo {{ __('Vehiculo') }}.</p>
                        </div>
                        
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" action="{{ route('vehiculos.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('vehiculo.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
