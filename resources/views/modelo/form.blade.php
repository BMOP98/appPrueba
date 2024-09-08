<div class="space-y-6">

    <div>
        <x-label for="nombre" :value="__('Nombre')"/>
        <x-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $modelo?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="marca_id" :value="__('Marca')" />
        <select id="marca_id" name="marca_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione Marca --</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" {{ old('marca_id', $modelo?->marca_id) == $marca->id ? 'selected' : '' }}>
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" for="marca_id" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
