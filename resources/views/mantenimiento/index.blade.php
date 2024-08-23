@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-semibold mb-4">Mantenimientos para el vehículo: {{ $auto->nombre }}</h1>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Fecha de Mantenimiento</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Próximo Mantenimiento</th>
                    <th class="px-4 py-2">Mano de Obra</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mantenimientos as $mantenimiento)
                    <tr>
                        <td class="border px-4 py-2">{{ $mantenimiento->fecha_mantenimiento }}</td>
                        <td class="border px-4 py-2">{{ $mantenimiento->descripcion }}</td>
                        <td class="border px-4 py-2">{{ $mantenimiento->total }}</td>
                        <td class="border px-4 py-2">{{ $mantenimiento->proximo_mantenimiento }}</td>
                        <td class="border px-4 py-2">{{ $mantenimiento->mano_de_obra }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">No hay mantenimientos registrados para este vehículo.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('mecanicos.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Volver</a>
</div>
@endsection
