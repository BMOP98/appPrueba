<div class="space-y-6">

    <div>
        <x-label for="estado"
            :value="__('Estado')" />
        <x-input id="estado"
            name="estado"
            type="text"
            class="mt-1 block w-full"
            :value="old('estado', $estadoVehiculo?->estado)"
            autocomplete="estado"
            placeholder="Estado" />
        <x-input-error class="mt-2"
            for="estado" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Enviar</x-button>
    </div>
</div>
