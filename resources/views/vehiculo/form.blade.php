<div class="space-y-6">
    <!-- Select para Cliente -->
    <div>
        <x-label for="cliente_id"
            :value="__('Clientes')" />
        <select name="cliente_id"
            id="cliente_id"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione Cliente --</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2"
            for="cliente_id" />
    </div>

    <!-- Campo para Placa -->
    <div>
        <x-label for="placa"
            :value="__('Placa')" />
        <x-input id="placa"
            name="placa"
            type="text"
            class="mt-1 block w-full"
            :value="old('placa', $vehiculo?->placa)"
            autocomplete="placa"
            placeholder="Placa" />
        <x-input-error class="mt-2"
            for="placa" />
    </div>

    <!-- Campo para Color -->
    <div>
        <x-label for="color"
            :value="__('Color')" />
        <x-input id="color"
            name="color"
            type="text"
            class="mt-1 block w-full"
            :value="old('color', $vehiculo?->color)"
            autocomplete="color"
            placeholder="Color" />
        <x-input-error class="mt-2"
            for="color" />
    </div>

    <!-- Select para Categoría -->
    <div>
        <x-label for="categoria_id"
            :value="__('Categoría')" />
        <select name="categoria_id"
            id="categoria_id"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >
            <option value="">-- Seleccione Categoría --</option>
              @foreach ($categorias as $marca)
                <option value="{{ $marca->id }}">{{ $marca->categoria }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2"
            for="categoria_id" />
    </div>



    <!-- Select para Marca -->
    <div>
        <x-label for="marca_id"
            :value="__('Marca')" />
        <select name="marca_id"
            id="marca_id"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione Marca --</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2"
            for="marca_id" />
    </div>

    <!-- Select para Modelo -->
    <div>
        <x-label for="modelo_id"
            :value="__('Modelo')" />
        <select name="modelo_id"
            id="modelo_id"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            disabled>
            <option value="">-- Seleccione Modelo --</option>
        </select>
        <x-input-error class="mt-2"
            for="modelo_id" />
    </div>

    <!-- Select para Descripción -->
    <div>
        <x-label for="descripcion_id"
            :value="__('Descripción')" />
        <select name="descripcion_id"
            id="descripcion_id"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            disabled>
            <option value="">-- Seleccione Descripción --</option>
        </select>
        <x-input-error class="mt-2"
            for="descripcion_id" />
    </div>

    <!-- Select para Año -->
    <div>
        <x-label for="anio"
            :value="__('Año')" />
        <x-input id="color"
            name="anio"
            type="text"
            class="mt-1 block w-full"
            :value="old('anio', $vehiculo?->anio)"
            autocomplete="anio"
            placeholder="Anio" />
        <x-input-error class="mt-2"
            for="anio" />
    </div>

    <!-- Campo para Kilometraje -->
    <div>
        <x-label for="kilometraje"
            :value="__('Kilometraje')" />
        <x-input id="kilometraje"
            name="kilometraje"
            type="text"
            class="mt-1 block w-full"
            :value="old('kilometraje', $vehiculo?->kilometraje)"
            autocomplete="kilometraje"
            placeholder="Kilometraje" />
        <x-input-error class="mt-2"
            for="kilometraje" />
    </div>

    <!-- Select para Estado del Vehículo -->


    <!-- Botón de Envío -->
    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
<script>
    document.getElementById('marca_id').addEventListener('change', function() {
        let marcaId = this.value;
        fetch(`/ajax/modelos/${marcaId}`)
            .then(response => response.json())
            .then(data => {
                let modeloSelect = document.getElementById('modelo_id');
                modeloSelect.disabled = false;
                modeloSelect.innerHTML = '<option value="">-- Seleccione Modelo --</option>';
                data.modelos.forEach(modelo => {
                    modeloSelect.innerHTML +=
                        `<option value="${modelo.id}">${modelo.nombre}</option>`;
                });
            });
    });

    document.getElementById('modelo_id').addEventListener('change', function() {
        let modeloId = this.value;
        fetch(`/ajax/descripciones/${modeloId}`)
            .then(response => response.json())
            .then(data => {
                let descripcionSelect = document.getElementById('descripcion_id');
                descripcionSelect.disabled = false;
                descripcionSelect.innerHTML = '<option value="">-- Seleccione Descripción --</option>';
                data.descripciones.forEach(descripcion => {
                    descripcionSelect.innerHTML +=
                        `<option value="${descripcion.id}">${descripcion.descripcion}</option>`;
                });
            });
    });

    document.getElementById('descripcion_id').addEventListener('change', function() {
        let descripcionId = this.value;
        fetch(`/ajax/anios/${descripcionId}`)
            .then(response => response.json())
            .then(data => {
                let anioSelect = document.getElementById('anio_id');
                anioSelect.disabled = false;
                anioSelect.innerHTML = '<option value="">-- Seleccione Año --</option>';
                data.anios.forEach(anio => {
                    anioSelect.innerHTML += `<option value="${anio.id}">${anio.anio}</option>`;
                });
            });
    });
</script>
</div>
