<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vehiculo->name ?? __('Precio') . ' ' . __('Vehiculo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full my-5 mx-auto sm:px-6 lg:px-8"> <a class="text-blue-400 underline"
                href="{{ route('dashboard') }}">Dashboard</a> / <a class="text-blue-400 underline"
                href="{{ route('vehiculos.index') }}">Vehiculos</a> / {{ __('Condicion Mecanica') }}</div>
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
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-300 shadow-lg rounded-lg bg-white">
                                <div class="flex flex-col space-y-4 p-6">
                                    @foreach ($detalles as $item)
                                        <form method="POST"
                                            action="{{ route('vehiculo-detalles.update', $item->id) }}"
                                            enctype="multipart/form-data"
                                            class="grid grid-cols-12 gap-4 items-center detalle-form">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <p class="font-semibold text-gray-700 col-span-4">
                                                {{ $item->detalle->nombre }}</p>
                                            <p class="text-gray-900 col-span-2">
                                                <span
                                                    class="{{ $item->estado ? 'bg-green-500' : 'bg-red-500' }} text-white px-3 py-1 rounded-full">
                                                    {{ $item->estado ? 'Aprobado' : 'Rechazado' }}
                                                </span>
                                            </p>
                                            <p class="text-gray-900 col-span-2">
                                                {{ $item->descripcion }}
                                            </p>
                                            <x-input id="id"
                                                name="id"
                                                type="hidden"
                                                :value="old('id', $item->id)" />
                                            <x-input id="vehiculo_id"
                                                name="vehiculo_id"
                                                type="hidden"
                                                :value="old('vehiculo_id', $item->vehiculo_id)" />
                                            @if (!$item->estado)
                                                <x-input id="precio"
                                                    name="precio"
                                                    type="number"
                                                    class="col-span-4"
                                                    :value="old('precio', $item->precio ?? 0.0)"
                                                    step="0.01"
                                                    onchange="actualizarTotal()" />
                                            @endif
                                        </form>
                                    @endforeach
                                    <div
                                        class="flex justify-between items-center text-start border-t border-slate-200 pt-2">
                                        <p class="font-semibold text-gray-700 w-1/3">Total</p>
                                        <p class="text-gray-900 text-end w-1/3 total">{{ getTotalPrice($detalles) }}
                                        </p>
                                    </div>

                                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex justify-end">
                                        <a href="{{ route('vehiculos.updateEstado', $vehiculo->id) }}"
                                            class="rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                                            onclick="enviarFormularios(event)">Enviar Siguiente Fase</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        // Actualizar el total al cambiar un precio
        function actualizarTotal() {
            let total = 0;

            document.querySelectorAll('form.detalle-form').forEach(form => {
                // Verifica si el formulario ha sido enviado
                if (!form.dataset.enviado) {
                    const precioInput = form.querySelector('input[name="precio"]');
                    if (precioInput) {
                        const precioValue = parseFloat(precioInput.value);

                        // Verifica que el precio sea un número, que no sea nulo y que sea mayor que 0
                        if (!isNaN(precioValue) && precioValue >= 0) {
                            total += precioValue || 0;
                        } else if (precioValue <= 0) {
                            window.alert('No se permite un valor negativo');
                            precioInput.value = 0;
                            return;
                        } else {
                            window.alert('Por favor, ingrese un valor válido para el precio del vehículo');
                            return;
                        }
                    }
                }
            });

            document.querySelector('.total').innerText = total.toFixed(2);
        }

        function enviarFormularios(e) {
            e.preventDefault();

            // Crear un objeto FormData para enviar los datos
            let formData = new FormData();

            // Recorre cada formulario y agrega los valores al FormData
            document.querySelectorAll('form.detalle-form').forEach((form, index) => {
                const id = form.querySelector('input[name="id"]').value;
                const vehiculoId = form.querySelector('input[name="vehiculo_id"]').value;
                const precio = form.querySelector('input[name="precio"]') ? form.querySelector(
                    'input[name="precio"]').value : 0;
                // Agregar los valores al FormData usando un formato array
                formData.append(`detalles[${index}][id]`, id);
                formData.append(`detalles[${index}][vehiculoId]`, vehiculoId);
                formData.append(`detalles[${index}][precio]`, precio);
            });

            // Enviar el FormData a través de una solicitud POST
            fetch("{{ route('vehiculo-detalles.batchUpdate') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    console.log(response);

                })
                .then(data => {
                    // Manejar la respuesta
                    if (data.success) {
                        window.location.href = "{{ route('vehiculos.index') }}";
                    } else {
                        alert('Hubo un error al actualizar los detalles.');
                    }
                })
                .catch(error => console.error('Error:', error)).finally(() => {
                    window.location.href = '/vehiculos/'
                }).finally(() => {
                    window.location.href = '/vehiculos/'
                })
        }
    </script>
</x-app-layout>
