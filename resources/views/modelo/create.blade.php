<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('modelos.store') }}">
            @csrf

            <!-- Campo para el nombre del modelo -->
            <div>
                <x-label for="nombre" value="Nombre del Modelo" class="text-[#e5e5e5]" />
                <x-input id="nombre" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#e5e5e5] focus:border-[#002347] focus:ring-[#002347] rounded-md shadow-sm" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <!-- Dropdown para seleccionar la marca -->
            <div class="mt-4">
                <x-label for="id_marca" value="Marca" class="text-[#e5e5e5]" />
                <select id="id_marca" name="id_marca" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#e5e5e5] focus:border-[#002347] focus:ring-[#002347] rounded-md shadow-sm">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" class="bg-[#001233] text-[#e5e5e5]">{{ $marca->marca }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para el año del modelo -->
            <div class="mt-4">
                <x-label for="anio" value="Año del Modelo" class="text-[#e5e5e5]" />
                <x-input id="anio" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#e5e5e5] focus:border-[#002347] focus:ring-[#002347] rounded-md shadow-sm" type="number" name="anio" :value="old('anio')" required />
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('modelos.index') }}" class="underline text-sm text-[#e5e5e5] hover:text-[#002347] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#002347] dark:focus:ring-offset-[#001233] mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4 bg-[#001233] hover:bg-[#002347] text-[#e5e5e5]">
                    {{ __('Crear Modelo') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
