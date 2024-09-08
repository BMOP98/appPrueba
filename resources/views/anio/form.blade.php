<div class="space-y-6">

    <div>
        <x-label for="anio" :value="__('Anio')"/>
        <x-input id="anio" name="anio" type="text" class="mt-1 block w-full" :value="old('anio', $anio?->anio)" autocomplete="anio" placeholder="Anio"/>
        <x-input-error class="mt-2" for="column"/>
    </div>
    

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
