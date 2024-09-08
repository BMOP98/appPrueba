<div class="space-y-6">
    
    <div>
        <x-label for="name" :value="__('Name')"/>
        <x-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $role?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" for="column"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
