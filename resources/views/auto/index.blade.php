<x-guest-layout>    
    <x-authentication-card>
        <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-[#ffffff] dark:bg-[#1f2937] shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <!-- Botón Crear Auto -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('autos.create') }}" id="crear-auto-btn" class="bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] font-bold py-2 px-4 rounded">
                    Crear Auto
                </a>
            </div>

            <!-- Contenedor de la tabla -->
            <div class="overflow-x-auto w-full mb-8">
                <table class="min-w-full table-auto divide-y divide-gray-200 mb-1">
                    <thead class="bg-[#001233] dark:bg-[#001233] bg-opacity-90">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">ID Auto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Modelo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Año</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Número de Serie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#001233] divide-y divide-gray-200 dark:bg-[#001233] dark:divide-gray-600 bg-opacity-90">
                        @foreach ($autos as $auto)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $auto->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $auto->modelo->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $auto->modelo->anio }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $auto->numero_serie }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $auto->estado }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('autos.edit', $auto->id) }}" class="text-[#4b8cdb] hover:text-[#316ba8]">Editar</a>
                                
                                <form action="{{ route('autos.destroy', $auto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <a href="{{ route('dashboard') }}" class="bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] font-bold py-2 px-4 rounded my-10">
            Volver al Inicio
        </a>
        </div>
    </x-authentication-card>
</x-guest-layout>

