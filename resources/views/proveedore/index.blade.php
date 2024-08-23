<x-guest-layout>    
    <x-authentication-card>
        <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-[#ffffff] dark:bg-[#1f2937] shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <!-- Botón Crear Proveedor -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('proveedores.create') }}" class="bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] font-bold py-2 px-4 rounded">
                    Crear Proveedor
                </a>
            </div>

            <!-- Contenedor de la tabla con overflow-x-auto para permitir scroll horizontal si es necesario -->
            <div class="overflow-x-auto w-full mb-8">
                <table class="min-w-full table-auto divide-y divide-gray-200 mb-1">
                    <thead class="bg-[#001233] dark:bg-[#001233]">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                                ID Proveedor
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                                Correo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                                Dirección
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#001233] divide-y divide-gray-200 dark:bg-[#001233] dark:divide-gray-600">
                        @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $proveedor->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $proveedor->nombre_proveedor }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $proveedor->telefono }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $proveedor->correo }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">
                                {{ $proveedor->direccion }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="text-[#4b8cdb] hover:text-[#316ba8]">Editar</a>
                                
                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
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
            
            <a href="{{ route('dashboard') }}" class="bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] font-bold py-2 px-4 rounded mt-4">
                Volver al Inicio
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
