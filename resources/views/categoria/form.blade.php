<div class="space-y-6">

    <div>
        <x-label for="categoria" :value="__('Categoria')"/>
        <x-input id="categoria" name="categoria" type="text" class="mt-1 block w-full" :value="old('categoria', $categoria?->categoria)" autocomplete="categoria" placeholder="Categoria"/>
        <x-input-error class="mt-2" for="categoria"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
