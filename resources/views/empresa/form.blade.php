<div class="space-y-6">

    <div>
        <x-label for="nombre"
            :value="__('Nombre')" />
        <x-input id="nombre"
            name="nombre"
            type="text"
            class="mt-1 block w-full"
            :value="old('nombre', $empresa?->nombre)"
            autocomplete="nombre"
            placeholder="Nombre" />
        <x-input-error class="mt-2"
            for='nombre' />
    </div>
    <div>
        <x-label for="direccion"
            :value="__('Direccion')" />
        <x-input id="direccion"
            name="direccion"
            type="text"
            class="mt-1 block w-full"
            :value="old('direccion', $empresa?->direccion)"
            autocomplete="direccion"
            placeholder="Direccion" />
        <x-input-error class="mt-2"
            for='direccion' />
    </div>
    <div>
        <x-label for="ruc"
            :value="__('Ruc')" />
        <x-input id="ruc"
            name="ruc"
            type="text"
            class="mt-1 block w-full"
            :value="old('ruc', $empresa?->ruc)"
            autocomplete="ruc"
            placeholder="Ruc" />
        <x-input-error class="mt-2"
            for='ruc' />
    </div>
    <div>
        <x-label for="email"
            :value="__('Email')" />
        <x-input id="email"
            name="email"
            type="text"
            class="mt-1 block w-full"
            :value="old('email', $empresa?->email)"
            autocomplete="email"
            placeholder="Email" />
        <x-input-error class="mt-2"
            for='email' />
    </div>
    <div>
        <x-label for="telefono"
            :value="__('Telefono')" />
        <x-input id="telefono"
            name="telefono"
            type="text"
            class="mt-1 block w-full"
            :value="old('telefono', $empresa?->telefono)"
            autocomplete="telefono"
            placeholder="Telefono" />
        <x-input-error class="mt-2"
            for='telefono' />
    </div>
    <div>
        <x-label for="estado"
            :value="__('Estado')" />
        <x-toggle-button name="estado" :value="old('estado', $empresa?->estado)" />
        <x-input-error class="mt-2"
            for='estado' />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
