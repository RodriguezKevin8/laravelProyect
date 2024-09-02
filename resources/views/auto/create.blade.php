<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('autos.store') }}">
            @csrf

            <div class="mt-4">
                <x-label for="id_modelo" value="Modelo" />
                <select id="id_modelo" name="id_modelo" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#002347] focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm">
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}">{{ $modelo->nombre }} - {{ $modelo->anio }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="numero_serie" value="Número de Serie" />
                <x-input id="numero_serie" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#002347]" type="text" name="numero_serie" :value="old('numero_serie')" required />
            </div>

            <div class="mt-4">
                <x-label for="estado" value="Estado" />
                <select id="estado" name="estado" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#002347] focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm">
                    <option value="Disponible">Disponible</option>
                    <option value="No disponible">No disponible</option>
                    
                </select>
            </div>

            <div class="mt-4">
                <x-label for="detalles" value="Detalles" />
                <textarea id="detalles" name="detalles" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#002347] focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm">{{ old('detalles') }}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('autos.index') }}" class="underline text-sm text-[#e5e5e5] hover:text-[#4b8cdb] dark:hover:text-[#4b8cdb] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4b8cdb] dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4 bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] border-[#002347]">
                    {{ __('Crear Auto') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
