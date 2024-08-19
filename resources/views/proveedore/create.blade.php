<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('proveedores.store') }}">
            @csrf

            <div>
                <x-label for="nombre_proveedor" value="Nombre del Proveedor" />
                <x-input id="nombre_proveedor" class="block mt-1 w-full" type="text" name="nombre_proveedor" :value="old('nombre_proveedor')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="telefono" value="Teléfono" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
            </div>

            <div class="mt-4">
                <x-label for="correo" value="Correo Electrónico" />
                <x-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" required />
            </div>

            <div class="mt-4">
                <x-label for="direccion" value="Dirección" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('proveedores.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Crear Proveedor') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
