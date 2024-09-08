<div class="space-y-6">


    <div>
        <x-label for="valores_mecanicos"
            :value="__('Valores Mecanicos')" />
        <x-input id="valores_mecanicos"
            name="valores_mecanicos"
            type="text"
            class="mt-1 block w-full"
            :value="old('valores_mecanicos', $vehiculoPrecio?->valores_mecanicos)"
            autocomplete="valores_mecanicos"
            placeholder="Valores Mecanicos" />
        <x-input-error class="mt-2"
            for="column" />
    </div>
    <div>
        <x-label for="valor_sistema"
            :value="__('Valor Sistema')" />
        <x-input id="valor_sistema"
            name="valor_sistema"
            type="text"
            class="mt-1 block w-full"
            :value="old('valor_sistema', $vehiculoPrecio?->valor_sistema)"
            autocomplete="valor_sistema"
            placeholder="Valor Sistema" />
        <x-input-error class="mt-2"
            for="column" />
    </div>
    <div>
        <x-label for="oferta"
            :value="__('Oferta')" />
        <x-input id="oferta"
            name="oferta"
            type="text"
            class="mt-1 block w-full"
            :value="old('oferta', $vehiculoPrecio?->oferta)"
            autocomplete="oferta"
            placeholder="Oferta" />
        <x-input-error class="mt-2"
            for="column" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
