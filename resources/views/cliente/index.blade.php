<x-guest-layout>
    <x-authentication-card>
        <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-[#001233] dark:bg-primary-dark shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <!-- Botón Crear Cliente -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('clientes.create') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
                    Crear Cliente
                </a>
            </div>

            <!-- Contenedor de la tabla con overflow-x-auto para permitir scroll horizontal si es necesario -->
            <div class="overflow-x-auto w-full mb-8">
                <table class="min-w-full table-auto divide-y divide-gray-200 mb-10">
                    <thead class=" bg-[#001233]">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID Cliente
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Correo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dirección
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y divide-gray-200 dark:bg-secondary-dark dark:divide-gray-600">
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $cliente->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $cliente->nombre }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $cliente->telefono }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $cliente->correo }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $cliente->direccion }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-tertiary-light hover:text-tertiary-dark">Editar</a>
                                
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700 hover:text-danger-dark ml-4">Eliminar</button>
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
        </div>
    </x-authentication-card>
</x-guest-layout>
