<x-guest-layout>
    <x-authentication-card>
        
            <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-[#001233] shadow-md overflow-hidden sm:rounded-lg">
                
                <h1 class="text-2xl font-semibold mb-4 text-[#e5e5e5]">Mantenimientos para el vehículo: {{ $auto->nombre }}</h1>
                
                <div class="overflow-x-auto w-full mb-8">
                    <table class="min-w-full table-auto divide-y divide-gray-200 mb-10">
                        <thead class="bg-[#001233] dark:bg-[#001233] bg-opacity-90">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Fecha de Mantenimiento</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Próximo Mantenimiento</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#e5e5e5] uppercase tracking-wider">Mano de Obra</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#001233] divide-y divide-gray-200 dark:bg-[#001233] dark:divide-gray-600 bg-opacity-90">
                            @forelse ($mantenimientos as $mantenimiento)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $mantenimiento->fecha_mantenimiento }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $mantenimiento->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $mantenimiento->total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $mantenimiento->proximo_mantenimiento }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $mantenimiento->mano_de_obra }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-[#e5e5e5]" colspan="5">No hay mantenimientos registrados para este vehículo.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('auto_mantenimientos.index') }}" class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">
                    Volver
                </a>
            </div>
        
    </x-authentication-card>
</x-guest-layout>
