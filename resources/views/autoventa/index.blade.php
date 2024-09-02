<x-guest-layout>        
    <x-authentication-card>
        <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-[#001233] shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Autos Disponibles</h2>

          
            <form method="GET" action="{{ route('autoventas.index') }}" class="mb-4">
                <div class="flex items-center">
                    <label for="marca_id" class="mr-2 text-white">Filtrar por Marca:</label>
                    <select id="marca_id" name="marca_id" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Todas las Marcas</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ request('marca_id') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->marca }}
                            </option>
                        @endforeach
                    </select>
                    <x-button class="ml-4">
                        {{ __('Filtrar') }}
                    </x-button>
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($autos as $auto)
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                                Modelo: {{ $auto->modelo->nombre }} - Año: {{ $auto->modelo->anio }}
                            </h3>
                            <p class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-300">
                                Número de Serie: {{ $auto->numero_serie }}
                            </p>
                            <p class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-300">
                                Estado: {{ $auto->estado }}
                            </p>
                            <p class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-300">
                                Detalles: {{ $auto->detalles ?? 'N/A' }}
                            </p>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6">
                            <a href="{{ route('garantia.create', $auto->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver Detalles y Asignar Garantía</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                <a href="{{ route('dashboard') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
                    Volver al Inicio
                </a>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
