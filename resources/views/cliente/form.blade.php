<div class="space-y-6">

    <div>
        <x-label for="nombre"
            :value="__('Nombre')" />
        <x-input id="nombre"
            name="nombre"
            type="text"
            class="mt-1 block w-full"
            :value="old('nombre', $cliente?->nombre)"
            autocomplete="nombre"
            placeholder="Nombre" />
        <x-input-error class="mt-2"
            for="nombre" />
    </div>
    <div>
        <x-label for="apellido"
            :value="__('Apellido')" />
        <x-input id="apellido"
            name="apellido"
            type="text"
            class="mt-1 block w-full"
            :value="old('apellido', $cliente?->apellido)"
            autocomplete="apellido"
            placeholder="apellido" />
        <x-input-error class="mt-2"
            for="apellido" />
    </div>
    <div>
        <x-label for="cedula"
            :value="__('Cedula')" />
        <x-input id="cedula"
            name="cedula"
            type="text"
            class="mt-1 block w-full"
            :value="old('cedula', $cliente?->cedula)"
            autocomplete="cedula"
            placeholder="Cedula" />
        <x-input-error class="mt-2"
            for="cedula" />
    </div>
    <div>
        <x-label for="telefono"
            :value="__('Telefono')" />
        <x-input id="telefono"
            name="telefono"
            type="text"
            class="mt-1 block w-full"
            :value="old('telefono', $cliente?->telefono)"
            autocomplete="telefono"
            placeholder="Telefono" />
        <x-input-error class="mt-2"
            for="telefono" />
    </div>
    <div>
        <x-label for="email"
            :value="__('Email')" />
        <x-input id="email"
            name="email"
            type="text"
            class="mt-1 block w-full"
            :value="old('email', $cliente?->email)"
            autocomplete="email"
            placeholder="Email" />
        <x-input-error class="mt-2"
            for="email" />
    </div>
    <div>
        <x-label for="direccion"
            :value="__('Direccion')" />
        <x-input id="direccion"
            name="direccion"
            type="text"
            class="mt-1 block w-full"
            :value="old('direccion', $cliente?->direccion)"
            autocomplete="direccion"
            placeholder="Direccion" />
        <x-input-error class="mt-2"
            for="direccion" />
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
