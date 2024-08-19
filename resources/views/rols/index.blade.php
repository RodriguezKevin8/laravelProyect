<x-app-layout>
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6">Lista de Roles</h1>

        @if($rols->isEmpty())
            <p>No hay roles disponibles.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Nombre del Rol</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($rols as $rols)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $rols->id }}</td>
                                <td class="py-3 px-6 text-left">{{ $rols->rol }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>