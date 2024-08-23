<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('mantenimiento.store') }}">
            @csrf

            <!-- Campo para la fecha de mantenimiento -->
            <div>
                <x-label for="fecha_mantenimiento" value="Fecha de Mantenimiento" class="text-[#e5e5e5]" />
                <x-input id="fecha_mantenimiento" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm" type="date" name="fecha_mantenimiento" :value="old('fecha_mantenimiento')" required autofocus />
            </div>

            <!-- Campo para la descripción -->
            <div class="mt-4">
                <x-label for="descripcion" value="Descripción" class="text-[#e5e5e5]" />
                <textarea id="descripcion" name="descripcion" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm" rows="3">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Campo oculto para el ID del auto -->
            <input type="hidden" name="id_auto" id="id_auto" value="{{ $auto->id }}">

            <!-- Campo para el total -->
            <div class="mt-4">
                <x-label for="total" value="Precio Mantenimiento" class="text-[#e5e5e5]" />
                <x-input id="total" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm" type="number" name="total" :value="old('total')" step="0.01" />
            </div>

            <!-- Campo para la fecha del próximo mantenimiento -->
            <div class="mt-4">
                <x-label for="proximo_mantenimiento" value="Próximo Mantenimiento" class="text-[#e5e5e5]" />
                <x-input id="proximo_mantenimiento" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm" type="date" name="proximo_mantenimiento" :value="old('proximo_mantenimiento')" />
            </div>

            <!-- Campo oculto para el ID del usuario -->
            <input type="hidden" name="id_usuario" id="id_usuario" value="{{ auth()->user()->id }}">

            <!-- Campo para el ID del método de pago -->
            <div class="mt-4">
                <x-label for="id_metodo_pago" value="Método de Pago" class="text-[#e5e5e5]" />
                <select id="id_metodo_pago" name="id_metodo_pago" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm">
                    @foreach($metodoPagos as $metodoPago)
                        <option value="{{ $metodoPago->id }}">{{ $metodoPago->tipo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para mano de obra -->
            <div class="mt-4">
                <x-label for="mano_de_obra" value="Mano de Obra" class="text-[#e5e5e5]" />
                <x-input id="mano_de_obra" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm" type="number" name="mano_de_obra" :value="old('mano_de_obra')" step="0.01" />
            </div>

            <!-- Campo para seleccionar repuestos -->
            <div class="mt-4">
                <x-label for="repuestos" value="Repuestos" class="text-[#e5e5e5]" />
                <select id="repuestos" name="repuestos[]" multiple class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-700 focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm">
                    @foreach($repuestos as $repuesto)
                        <option value="{{ $repuesto->id_repuesto }}">{{ $repuesto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('mecanicos.index') }}" class="underline text-sm text-[#e5e5e5] hover:text-[#4b8cdb] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4b8cdb] dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4 bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] font-bold py-2 px-4 rounded">
                    {{ __('Guardar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    const idUsuario = parseInt(localStorage.getItem('id_user'), 10);

    if (!isNaN(idUsuario)) {
        document.getElementById('id_usuario').value = idUsuario;
        console.log('ID de usuario asignado:', idUsuario);
    } else {
        console.error('ID de usuario no es un número válido');
    }
</script>
