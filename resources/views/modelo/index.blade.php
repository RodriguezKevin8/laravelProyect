<x-guest-layout> 
    <x-authentication-card>        
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <!-- Botón Crear Modelo -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('modelos.create') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
                    Crear Modelo
                </a>
            </div>

            <!-- Contenedor de la tabla con overflow-x-auto para permitir scroll horizontal si es necesario -->
            <div class="overflow-x-auto w-full mb-8"> <!-- Ajustar margen inferior aquí -->
                <table class="min-w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-[#001233] dark:bg-[#001233]">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider w-1/12">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider w-3/12">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider w-3/12">
                                Marca
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider w-2/12">
                                Año
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider w-3/12">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#001233] divide-y divide-gray-200 dark:bg-[#001233] dark:divide-gray-600">
                        @foreach ($modelos as $modelo)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $modelo->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $modelo->nombre }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $modelo->marca->marca }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $modelo->anio }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('modelos.edit', $modelo->id) }}" class="text-[#4b8cdb] hover:text-[#316ba8]">Editar</a>
                                
                                <form action="{{ route('modelos.destroy', $modelo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ms-4">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Botón Volver al Inicio con margen superior aumentado -->
            <div class="mt-8">
                <a href="{{ route('dashboard') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
                    Volver al Inicio
                </a>
            </div>    
        </div>    
    </x-authentication-card>
</x-guest-layout>
