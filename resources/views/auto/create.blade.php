<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('autos.store') }}">
            @csrf

            <div class="mt-4">
                <x-label for="id_modelo" value="Modelo" />
                <select id="id_modelo" name="id_modelo" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}">{{ $modelo->nombre }} - {{ $modelo->anio }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="numero_serie" value="Número de Serie" />
                <x-input id="numero_serie" class="block mt-1 w-full" type="text" name="numero_serie" :value="old('numero_serie')" required />
            </div>

            <div class="mt-4">
                <x-label for="estado" value="Estado" />
                <select id="estado" name="estado" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="Disponible">Disponible</option>
                    <option value="No disponible">No disponible</option>
                    <option value="Vendido">Vendido</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="detalles" value="Detalles" />
                <textarea id="detalles" name="detalles" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('detalles') }}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('autos.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Crear Auto') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
