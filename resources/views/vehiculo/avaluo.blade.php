<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vehiculo->name ?? __('Avaluo') . ' ' . __('Vehiculo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"> <a class="text-blue-400 underline"
                href="{{ route('dashboard') }}">Dashboard</a> / <a class="text-blue-400 underline"
                href="{{ route('vehiculos.index') }}">Vehiculos</a> / {{ __('Detalle del Vehiculo') }}</div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Detalles del
                                {{ __('Vehiculo') }}
                                {{ $vehiculo->placa }}</h1>
                        </div>

                    </div>
                    <div class="flex flex-col  items-center py-6">
                        <div class="container px-4 sm:px-6 lg:px-8 my-5">
                            <div class="overflow-hidden border border-gray-300 shadow-lg rounded-lg bg-white">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 p-6">
                                    <div class="flex space-x-4 border border-slate-200 rounded-lg items-center">
                                        <p class="font-semibold text-gray-700 text-lg p-4">Nombre:</p>
                                        <p class="text-gray-900">{{ $vehiculo->cliente->nombre }}</p>
                                    </div>
                                    <div class="flex space-x-4 border border-slate-200 rounded-lg items-center">
                                        <p class="font-semibold text-gray-700 text-lg p-4">Año:</p>
                                        <p class="text-gray-900">{{ $vehiculo->anio }}</p>
                                    </div>
                                    <div class="flex space-x-4 border border-slate-200 rounded-lg items-center">
                                        <p class="font-semibold text-gray-700 text-lg p-4">Marca:</p>
                                        <p class="text-gray-900">{{ $vehiculo->marca->nombre }}</p>
                                    </div>
                                    <div class="flex space-x-4 border border-slate-200 rounded-lg items-center">
                                        <p class="font-semibold text-gray-700 text-lg p-4">Modelo:</p>
                                        <p class="text-gray-900">{{ $vehiculo->modelo->nombre }}</p>
                                    </div>
                                    <div class="flex space-x-4 border border-slate-200 rounded-lg items-center">
                                        <p class="font-semibold text-gray-700 text-lg p-4">Kilometraje:</p>
                                        <p class="text-gray-900">{{ $vehiculo->kilometraje }}</p>
                                    </div>
                                    <div class="flex space-x-4 border border-slate-200 rounded-lg items-center">
                                        <p class="font-semibold text-gray-700 text-lg p-4">Color:</p>
                                        <p class="text-gray-900">{{ $vehiculo->color }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 container  px-4 sm:px-6 lg:px-8 my-5">
                            <div class="overflow-hidden border border-gray-300 shadow-lg rounded-lg bg-white">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 p-6">
                                    <div>
                                        <meta name="csrf-token"
                                            content="{{ csrf_token() }}">
                                        <input type="hidden"
                                            id="id_vehiculo"
                                            value="{{ $vehiculo->id }}">
                                        <input type="hidden"
                                            id="anio"
                                            value="{{ $vehiculo->anio }}">
                                        <input type="hidden"
                                            id="kilometraje"
                                            value="{{ $vehiculo->kilometraje }}">
                                        <input type="hidden"
                                            id="valoMeca"
                                            value="{{ $vehiculo->valores_mecanicos }}">
                                        <x-label for="precio_vehiculo"
                                            :value="__('Valor del Vehiculo')" />
                                            <x-input id="precio_vehiculo"
                                            name="precio_vehiculo"
                                            type="number"
                                            class="mt-1 block w-full"
                                            :value="old('precio_vehiculo', $vehiculoPrecio?->precio_vehiculo)"
                                            placeholder="Valor del Vehiculo"
                                            disabled />
                                            <x-input-error class="mt-2"
                                                for="precio_vehiculo" />
                                    </div>

                                    <div>
                                        <x-label for="iva"
                                            :value="__('Iva %')" />
                                        <x-input id="iva"
                                            name="iva"
                                            type="number"
                                            class="mt-1 block w-full bg-gray-200"
                                            value="15" />
                                        <x-input-error class="mt-2"
                                            for="iva" />
                                    </div>
                                    <div>
                                        <x-label for="depreciacion"
                                            :value="__('Depreciacion')" />
                                        <select name="depreciacion"
                                            id="depreciacion"
                                            disabled
                                            class="border-gray-300 my-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="">-- Seleccione --</option>
                                            <option value="5"
                                                {{ old('depreciacion', $vehiculoPrecio?->depreciacion) == 5 ? 'selected' : '' }}>
                                                5 %</option>
                                            <option value="6"
                                                {{ old('depreciacion', $vehiculoPrecio?->depreciacion) == 6 ? 'selected' : '' }}>
                                                6 %</option>
                                            <option value="7"
                                                {{ old('depreciacion', $vehiculoPrecio?->depreciacion) == 7 ? 'selected' : '' }}>
                                                7 %</option>
                                            <option value="8"
                                                {{ old('depreciacion', $vehiculoPrecio?->depreciacion) == 8 ? 'selected' : '' }}>
                                                8 %</option>
                                            <option value="9"
                                                {{ old('depreciacion', $vehiculoPrecio?->depreciacion) == 9 ? 'selected' : '' }}>
                                                9 %</option>
                                            <option value="10"
                                                {{ old('depreciacion', $vehiculoPrecio?->depreciacion) == 10 ? 'selected' : '' }}>
                                                10 %</option>
                                        </select>
                                        <x-input-error class="mt-2"
                                            for="depreciacion" />
                                    </div>

                                    <div class="my-5">
                                        <x-label for="precio_final"
                                            :value="__('Precio Vehiculo')" />
                                        <x-input id="precio_final"
                                            name="precio_final"
                                            type="number"
                                            :value="old('oferta', $vehiculoPrecio?->valor_sistema)"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Precio Vehiculo"
                                            readonly />
                                    </div>
                                    <div class="my-5">
                                        <x-label for="anios_antiguedad"
                                            :value="__('Años de Antigüedad Por Kilometraje')" />
                                        <x-input id="anios_antiguedad"
                                            name="anios_antiguedad"
                                            type="number"
                                            :value="old('oferta', $vehiculoPrecio?->valor_sistema)"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Años de Antigüedad"
                                            readonly />
                                    </div>
                                    <div class="my-5">
                                        <x-label for="valores_mecanicos"
                                            :value="__('Valores Mecanicos')" />
                                        <x-input id="valores_mecanicos"
                                            name="valores_mecanicos"
                                            type="number"
                                            :value="old('oferta', $vehiculoPrecio?->valor_sistema)"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Valores Mecanicos"
                                            readonly />
                                    </div>



                                    <div class="my-5 bg-indigo-500 p-3 rounded-lg">
                                        <x-label for="valor_sistema"
                                            class="text-white"
                                            :value="__('Valor Sistema')" />
                                        <x-input id="valor_sistema"
                                            name="valor_sistema"
                                            type="number"
                                            :value="old('oferta', $vehiculoPrecio?->valor_sistema)"
                                            class="mt-1 block w-full bg-gray-200"
                                            placeholder="Valor Sistema"
                                            readonly />
                                    </div>
                                    <div class="my-5 bg-indigo-500 p-3 rounded-lg">
                                        <x-label for="valor_sistema"
                                            class="text-white"
                                            :value="__('Oferta Final')" />
                                        <x-input id="oferta"
                                            name="oferta"
                                            type="number"
                                            class="mt-1 "
                                            :value="old('oferta', $vehiculoPrecio?->oferta)"
                                            placeholder="Oferta Final" />
                                    </div>
                                    <div class="content-center">
                                        <button id="guardarCalculo"
                                            class="bg-green-500 w-full max-w-32 h-10 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div x-data="{ showModal: false }">
            <!-- Modal -->
            <div x-show="showModal"
                class="fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold">¿Está seguro que desea eliminar este registro?</h2>
                    <div class="mt-4 flex justify-end">
                        <button @click="showModal = false"
                            class="bg-gray-300 px-4 py-2 rounded mr-2">Cancelar</button>
                        <button @click="confirmAction()"
                            class="bg-red-500 text-white px-4 py-2 rounded">Aceptar</button>
                    </div>
                </div>
            </div>

            <!-- Overlay -->
            <div x-show="showModal"
                class="fixed inset-0 bg-black opacity-50 z-40"></div>
        </div>
    </div>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
        var precioVehiculoInput = document.getElementById('precio_vehiculo');
        var depreciacionVehiculoInput = document.getElementById('depreciacion');
        var estadoVehiculoId = {{ $vehiculo->estado_vehiculo_id }};

        // Deshabilitar el input al cargar la página
        precioVehiculoInput.disabled = true;
        depreciacionVehiculoInput.disabled = true;

        // Verificar el estado del vehículo y ajustar el estado del input
        if (estadoVehiculoId < 6) {
            precioVehiculoInput.disabled = false;
            depreciacionVehiculoInput.disabled = false;
        }
    });
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('depreciacion').addEventListener('change', calculate);

            function calculate() {
                // Your existing calculation logic here
                const precioVehiculo = parseFloat(document.getElementById('precio_vehiculo').value);
                const depreciacion = parseFloat(document.getElementById('depreciacion').value);

                const anio = parseFloat(document.getElementById('anio').value);
                const kilometraje = parseFloat(document.getElementById('kilometraje').value);
                const iva = parseFloat(document.getElementById('iva').value);
                const valoMeca = parseFloat(document.getElementById('valoMeca').value);
                if (isNaN(precioVehiculo) || isNaN(depreciacion)) {
                    alert('Por favor, ingrese valores válidos para el precio del vehículo y la depreciación.');
                    return;
                }
                if (precioVehiculo <= 0) {
                    window.alert('No se permite un valor negativo');
                    document.getElementById('precio_vehiculo').value = 0;
                    return;
                }
                let aniosAntiguedad = Math.floor(kilometraje / 20000);
                aniosAntiguedad = aniosAntiguedad > 0 ? aniosAntiguedad : 1;
                document.getElementById('anios_antiguedad').value = aniosAntiguedad;
                const precioSinIva = precioVehiculo - (precioVehiculo * (iva / 100));
                let precioFinal = precioSinIva;
                for (let i = 0; i < aniosAntiguedad; i++) {
                    precioFinal -= ((precioFinal * depreciacion) / 100);
                }
                document.getElementById('precio_final').value = precioFinal.toFixed(2);
                document.getElementById('valores_mecanicos').value = valoMeca;
                document.getElementById('valor_sistema').value = (precioFinal - valoMeca).toFixed(2);
            }

            document.getElementById('guardarCalculo').addEventListener('click', function() {
                const formData = new FormData();

                const idVehiculo = parseInt(document.getElementById('id_vehiculo').value);

                formData.append('vehiculo_id', idVehiculo); // Reemplaza con el valor adecuado
                formData.append('precio_vehiculo', document.getElementById('precio_vehiculo').value);
                formData.append('depreciacion', document.getElementById('depreciacion').value);
                formData.append('iva', document.getElementById('iva').value);
                formData.append('anio_antiguedad_kilometraje', document.getElementById('anios_antiguedad')
                    .value);
                formData.append('valor_sistema', document.getElementById('valor_sistema').value);
                formData.append('oferta', document.getElementById('oferta').value);

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/vehiculo-precios', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: formData
                    })
                    .then(response => {
                        console.log(response);
                        return response
                    })
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error(error);
                    }).finally(() => {
                         window.location.href = '/vehiculos/'
                    })
            });
        });
    </script>
</x-app-layout>
