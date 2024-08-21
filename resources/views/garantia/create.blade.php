<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('garantia.store') }}">
            @csrf

            <input type="hidden" name="id_auto" value="{{ $auto->id }}">

            <div class="mt-4">
                <x-label for="fecha_inicio" value="Fecha de Inicio de la Garantía" />
                <x-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio" :value="old('fecha_inicio')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="fecha_fin" value="Fecha de Fin de la Garantía" />
                <x-input id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin" :value="old('fecha_fin')" required />
            </div>

            <div class="mt-4">
                <x-label for="id_tipo_garantia" value="Tipo de Garantía" />
                <select id="id_tipo_garantia" name="id_tipo_garantia" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @foreach($tiposGarantia as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->tipoGarantia }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('autos.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Asignar Garantía y Proceder a la Venta') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
