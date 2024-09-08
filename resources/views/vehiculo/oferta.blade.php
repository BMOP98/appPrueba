<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vehiculo->name ?? __('Oferta') . ' ' . __('Vehiculo') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"> <a class="text-blue-400 underline" href="{{ route('dashboard') }}">Dashboard</a> / <a class="text-blue-400 underline"
    href="{{ route('vehiculos.index') }}">Vehiculos</a> / {{ __('Oferta final') }}</div>
        <div class="flex justify-end max-w-3xl mx-auto ">
            <button onclick="imprimirPagina()"
                class="print:hidden px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-400">
                Imprimir
            </button>
        </div>
        <div class="max-w-3xl mx-auto sm:px-6 lg:p-8 space-y-6  bg-white shadow sm:rounded-lg">
            <div class="border-2 border-indigo-500 rounded-lg text-lg p-4 sm:p-8 ">
                <div class="grid grid-cols-2 sm:grid-cols-2 sm: gap-5">

                    <p><strong>Nombre:</strong> {{ $vehiculo->cliente->nombre }}</p>
                    <p><strong>Modelo:</strong> {{ $vehiculo->modelo->nombre }}</p>
                    <p><strong>Color:</strong> {{ $vehiculo->color }}</p>

                    <p><strong>Marca:</strong> {{ $vehiculo->marca->nombre }}</p>
                    <p><strong>Placa:</strong> {{ $vehiculo->placa }}</p>
                    <p><strong>Año:</strong> {{ $vehiculo->anio }}</p>
                    <p><strong>Kilometraje:</strong> {{ $vehiculo->kilometraje }} KM</p>

                </div>
            </div>
            <h2 class="bg-indigo-600 text-white uppercase text-lg text-center font-black p-2 print:text-black">Condición del Vehiculo</h2>
            <div class="border-2 border-indigo-500 rounded-lg text-lg p-4 sm:px-8 ">
                <div class="grid grid-cols-2 sm:grid-cols-2 sm: gap-5">
                    @foreach ($vehiculoDetalles as $item)
                        <p><strong>{{ $item->detalle->nombre }}:</strong>
                            {{ $item->estado ? 'Aprobado' : 'Reemplazar' }}</p>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center space-x-5 items-center border-2 p-5 border-indigo-500 rounded-lg">
                <p class="text-gray-900 font-black uppercase text-xl"> Oferta</p>
                <p class="text-gray-900 font-black uppercase text-xl">$ {{ formatearNumero($vehiculoPrecio->oferta) }}
                </p>


            </div>
        </div>
    </div>
    <script>
        function imprimirPagina() {
            window.print();
        }
    </script>
</x-app-layout>
