<div class="space-y-6">

    <div>
        <x-label for="nombre" :value="__('Nombre')"/>
        <x-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $marca?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" for="nombre"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>

