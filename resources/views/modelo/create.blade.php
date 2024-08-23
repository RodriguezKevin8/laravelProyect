<x-guest-layout>
    <x-authentication-card>
       
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('modelos.store') }}">
            @csrf

            <!-- Campo para el nombre del modelo -->
            <div>
                <x-label for="nombre" value="Nombre del Modelo" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <!-- Dropdown para seleccionar la marca -->
            <div class="mt-4">
                <x-label for="id_marca" value="Marca" />
                <select id="id_marca" name="id_marca" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para el año del modelo -->
            <div class="mt-4">
                <x-label for="anio" value="Año del Modelo" />
                <x-input id="anio" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" name="anio" :value="old('anio')" required />
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('modelos.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Crear Modelo') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
