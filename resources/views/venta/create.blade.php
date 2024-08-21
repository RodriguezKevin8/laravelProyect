<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('venta.store') }}">
            @csrf

            <!-- Campo oculto para el ID del auto -->
            <input type="hidden" name="id_auto" id="id_auto" value="{{ $auto->id }}">

            <!-- Campo oculto para almacenar el ID del usuario desde localStorage -->
            <input type="hidden" name="id_usuario" id="id_usuario" value="">

            <!-- Campo para la fecha de venta -->
            <div>
                <x-label for="fecha_venta" value="Fecha de Venta" />
                <x-input id="fecha_venta" class="block mt-1 w-full" type="date" name="fecha_venta" :value="old('fecha_venta')" required autofocus />
            </div>

            <!-- Campo para el precio de venta -->
            <div class="mt-4">
                <x-label for="precio" value="Precio de Venta" />
                <x-input id="precio" class="block mt-1 w-full" type="number" name="precio" :value="old('precio')" required />
            </div>

            <!-- Dropdown para seleccionar el cliente -->
            <div class="mt-4">
                <x-label for="id_cliente" value="Cliente" />
                <select id="id_cliente" name="id_cliente" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dropdown para seleccionar el método de pago -->
            <div class="mt-4">
                <x-label for="id_metodo_pago" value="Método de Pago" />
                <select id="id_metodo_pago" name="id_metodo_pago" class="block mt-1 w-full bg-gray-800 text-gray-200 border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    @foreach($metodosPago as $metodo)
                        <option value="{{ $metodo->id }}">{{ $metodo->tipo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('autos.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mx-5">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Completar Venta') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    const idUsuario = parseInt(localStorage.getItem('id_user'), 10);

    if (!isNaN(idUsuario)) {
        document.getElementById('id_usuario').value = idUsuario;
    } else {
        console.error('ID de usuario no es un número válido');
    }

    document.getElementById('id_cliente').addEventListener('change', function () {
        const clienteId = this.value;

        if (clienteId) {
            // Hacer la solicitud AJAX al servidor
            fetch('{{ route("ventas.total-compras") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id_cliente: clienteId })
            })
            .then(response => response.json())
            .then(data => {
                const totalCompras = data.total_compras;
                const selectMetodoPago = document.getElementById('id_metodo_pago');

                // Deshabilitar o habilitar la opción de financiamiento bancario
                const financiamientoOption = selectMetodoPago.querySelector('option[value="3"]'); // ID de financiamiento bancario
                if (totalCompras >= 50000) {
                    financiamientoOption.disabled = false;
                } else {
                    financiamientoOption.disabled = true;
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>
