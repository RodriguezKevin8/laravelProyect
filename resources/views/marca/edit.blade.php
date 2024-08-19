<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('marcas.update', $marca->id) }}">
            @csrf
            @method('PUT')

            <div>
                <x-label for="marca" value="Nombre de la Marca" />
                <x-input id="marca" class="block mt-1 w-full" type="text" name="marca" value="{{ $marca->marca }}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('marcas.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Actualizar Marca') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
