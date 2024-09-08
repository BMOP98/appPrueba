<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"><a class="text-blue-400 underline"
                href="{{ route('dashboard') }}">Dashboard</a> / {{ __('Usuarios') }}</div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Usuarios') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Lista de todos los {{ __('Usuarios') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button"
                                href="{{ route('users.create') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Nuevo
                                Registro</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="mb-4">
                                    <input type="text"
                                        id="searchInput"
                                        placeholder="Buscar"
                                        class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                No</th>

                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol</th>

                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($users as $user)
                                            <tr class="even:bg-gray-50">
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                    {{ ++$i }}</td>

                                                <td>{{ $user->nombre }}</td>
                                                <td>{{ $user->email }}</td>

                                                @if ($user->rol)
                                                    <td>{{ $user->rol->name }}</td>
                                                @else
                                                    <td></td>
                                                @endif

                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST"
                                                        class="flex">
                                                        <a href="{{ route('users.show', $user->id) }}"
                                                            class="text-gray-600 font-bold hover:text-gray-900 mr-2"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="size-6">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="text-indigo-600 font-bold hover:text-indigo-900  mr-2"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="size-6">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
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
                                                            </svg>
                                                        </a>
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
                                    {!! $users->withQueryString()->links() !!}
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
