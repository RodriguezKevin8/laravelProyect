<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
            @csrf
            @method('PUT')

            <div>
                <x-label for="nombre" value="Nombre del Cliente" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $cliente->nombre }}" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="correo" value="Correo Electrónico" />
                <x-input id="correo" class="block mt-1 w-full" type="email" name="correo" value="{{ $cliente->correo }}" required />
            </div>

            <div class="mt-4">
                <x-label for="telefono" value="Teléfono" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" value="{{ $cliente->telefono }}" required />
            </div>

            <div class="mt-4">
                <x-label for="direccion" value="Dirección" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" value="{{ $cliente->direccion }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('clientes.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Actualizar Cliente') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
