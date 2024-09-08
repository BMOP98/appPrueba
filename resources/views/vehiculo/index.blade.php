<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"><a class="text-blue-400 underline"
                href="{{ route('dashboard') }}">Dashboard</a> / {{ __('Vehiculos') }}</div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Vehiculos') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Lista de todos los {{ __('Vehiculos') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button"
                                href="{{ route('vehiculos.create') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Nuevo</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="mb-4">
                                    <input type="text"
                                        id="searchInput"
                                        placeholder="Buscar por placa..."
                                        class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                No</th>

                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Placa</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Color</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Categoria</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Marca</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Modelo</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Anio</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Kilometraje</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Cliente</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Fecha de Registro</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Estado Vehiculo</th>

                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($vehiculos as $index => $vehiculo)
                                            <tr class="{{ $index === 0 ? 'bg-indigo-200' : 'even:bg-gray-50' }}">
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                    {{ ++$i }}</td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->placa }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->color }}</td>
                                                 <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->categoria->categoria }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->marca->nombre }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->modelo->nombre }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->anio }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ formatearNumero($vehiculo->kilometraje) }} KM</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->created_at->translatedFormat('d \d\e F \d\e Y \a \l\a\s H:i') }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $vehiculo->estadoVehiculo->estado }}</td>

                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                                                        method="POST"
                                                        class="flex">
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id == 2 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Técnico de Mecanica'))
                                                            <p class="text-gray-600 font-bold hover:text-gray-900 mr-2">
                                                                {!! getEstadoVehiculoType($vehiculo->estado_vehiculo_id) !!}
                                                            </p>
                                                        @endif
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id < 7 &&
                                                                $vehiculo->estado_vehiculo_id != 2 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Coordinador Seminuevos'))
                                                            <a href="{{ route('vehiculos.updateEstado', $vehiculo->id) }}"
                                                                class="text-blue-600 font-bold hover:text-blue-900 mr-2">{!! getEstadoVehiculoType($vehiculo->estado_vehiculo_id) !!}</a>
                                                        @endif
                                                        @if ($vehiculo->estado_vehiculo_id == 1 && Auth::user()->rol->name == 'Asesor')
                                                            <a href="{{ route('vehiculos.updateEstado', $vehiculo->id) }}"
                                                                class="text-blue-600 font-bold hover:text-blue-900 mr-2">{!! getEstadoVehiculoType($vehiculo->estado_vehiculo_id) !!}</a>
                                                        @endif

                                                        @if (
                                                            $vehiculo->estado_vehiculo_id >= 6 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' ||
                                                                    Auth::user()->rol->name == 'Administrador' ||
                                                                    Auth::user()->rol->name == 'Asesor' ||
                                                                    Auth::user()->rol->name == 'Coordinador Seminuevos'))
                                                            <a href="{{ route('vehiculos.oferta', $vehiculo->id) }}"
                                                                class="text-gray-600 font-bold hover:text-gray-900 mr-2"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="size-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                                                </svg>
                                                            </a>
                                                        @endif

                                                        @csrf
                                                        @method('DELETE')
                                                        @if (
                                                            $vehiculo->estado_vehiculo_id <= 2 &&
                                                                (Auth::user()->rol->name == 'SuperAdmin' || Auth::user()->rol->name == 'Administrador'))
                                                            <a href="#"
                                                                class="text-red-600 font-bold hover:text-red-900 delete-button"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="size-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg></a>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="confirmModal"
                                    class="hidden fixed inset-0 z-50  items-center justify-center">
                                    <div class="bg-white p-6 rounded-lg shadow-lg">
                                        <h2 class="text-lg font-bold">¿Está seguro de que desea eliminar este registro?
                                        </h2>
                                        <div class="mt-4 flex justify-end">
                                            <button id="cancelButton"
                                                class="bg-gray-300 px-4 py-2 rounded mr-2">Cancelar</button>
                                            <button id="confirmButton"
                                                class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                        </div>
                                    </div>
                                    <div class="fixed inset-0 bg-black opacity-50 -z-50"></div>
                                </div>
                                <div class="mt-4 px-4">
                                    {!! $vehiculos->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('keyup', function() {
                const searchTerm = searchInput.value.toLowerCase();

                tableRows.forEach(function(row) {
                    const placa = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    if (placa.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('confirmModal');
            const cancelButton = document.getElementById('cancelButton');
            const confirmButton = document.getElementById('confirmButton');
            let formToSubmit = null;

            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    formToSubmit = button.closest('form');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            cancelButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            confirmButton.addEventListener('click', function() {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
            });
        });
    </script>
</x-app-layout>
