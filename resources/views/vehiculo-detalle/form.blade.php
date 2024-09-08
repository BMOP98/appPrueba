<div class="space-y-6">
    
    <div>
        <x-label for="vehiculo_id" :value="__('Vehiculo Id')"/>
        <x-input id="vehiculo_id" name="vehiculo_id" type="text" class="mt-1 block w-full" :value="old('vehiculo_id', $vehiculoDetalle?->vehiculo_id)" autocomplete="vehiculo_id" placeholder="Vehiculo Id"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="detalle_id" :value="__('Detalle Id')"/>
        <x-input id="detalle_id" name="detalle_id" type="text" class="mt-1 block w-full" :value="old('detalle_id', $vehiculoDetalle?->detalle_id)" autocomplete="detalle_id" placeholder="Detalle Id"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="estado" :value="__('Estado')"/>
        <x-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $vehiculoDetalle?->estado)" autocomplete="estado" placeholder="Estado"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="valor" :value="__('Valor')"/>
        <x-input id="valor" name="valor" type="text" class="mt-1 block w-full" :value="old('valor', $vehiculoDetalle?->valor)" autocomplete="valor" placeholder="Valor"/>
        <x-input-error class="mt-2" for="column"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
