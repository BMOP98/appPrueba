<div class="space-y-6">
    
    <div>
        <x-label for="nombre" :value="__('Nombre')"/>
        <x-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $permiso?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    <div>
        <x-label for="descripcion" :value="__('Descripcion')"/>
        <x-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" :value="old('descripcion', $permiso?->descripcion)" autocomplete="descripcion" placeholder="Descripcion"/>
        <x-input-error class="mt-2" for="column"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
