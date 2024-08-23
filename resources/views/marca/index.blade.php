<x-guest-layout>    
    <x-authentication-card>
        
        <x-validation-errors class="mb-4" />

        <!-- Botón Crear Marca -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('marcas.create') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
                Crear Marca
            </a>
        </div>

        <div class="overflow-hidden shadow-xl sm:rounded-lg bg-cover bg-center">
            <table class="min-w-full divide-y divide-gray-200 mb-10">
                <thead class="bg-[#001233] dark:bg-[#001233] bg-opacity-90">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                            ID Marca
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                            Marca
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[#001233] divide-y divide-gray-200 dark:bg-[#001233] dark:divide-gray-600 bg-opacity-90">
                    @foreach ($marcas as $marca)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                            {{ $marca->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                            {{ $marca->marca }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('marcas.edit', $marca->id) }}" class="text-[#4b8cdb] hover:text-[#316ba8]">Editar</a>
                            
                            <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display:inline;">
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
        
        <a href="{{ route('dashboard') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
            Volver al Inicio
        </a>
    </x-authentication-card>
    
</x-guest-layout>
