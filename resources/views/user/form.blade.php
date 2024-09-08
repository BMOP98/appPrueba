<div class="space-y-6">

    <div>
        <x-label for="nombre"
            :value="__('Nombre')" />
        <x-input id="nombre"
            name="nombre"
            type="text"
            class="mt-1 block w-full"
            :value="old('nombre', $user?->nombre)"
            autocomplete="nombre"
            placeholder="Nombre" />
        <x-input-error class="mt-2"
            for='nombre' />
    </div>
    <div>
        <x-label for="email"
            :value="__('Email')" />
        <x-input id="email"
            name="email"
            type="text"
            class="mt-1 block w-full"
            :value="old('email', $user?->email)"
            autocomplete="email"
            placeholder="Email" />
        <x-input-error class="mt-2"
            for='email' />
    </div>

    <div>
        <x-label for="rol_id" :value="__('Seleccione el Rol')"/>
        <select id="rol_id" name="rol_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">-- Seleccione --</option>
            @foreach ($roles as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" for="rol_id"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Enviar</x-button>
    </div>
</div>
