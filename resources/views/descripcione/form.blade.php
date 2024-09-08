<div class="space-y-6">

    <div>
        <x-label for="descripcion" :value="__('Descripcion')"/>
        <x-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" :value="old('descripcion', $descripcione?->descripcion)" autocomplete="descripcion" placeholder="Descripcion"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="modelo_id" :value="__('Modelo')" />
        <select id="modelo_id" name="modelo_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione Modelo --</option>
            @foreach ($modelos as $modelo)
                <option value="{{ $modelo->id }}" {{ old('modelo_id', $descripcione?->modelo_id) == $modelo->id ? 'selected' : '' }}>
                    {{ $modelo->nombre }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" for="modelo_id" />
    </div>
    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
