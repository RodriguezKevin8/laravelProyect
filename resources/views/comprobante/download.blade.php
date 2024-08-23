<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg text-center">
            <h1 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-100">
                Comprobante de Venta
            </h1>

            <p class="text-gray-700 dark:text-gray-300">El comprobante ha sido generado. Puedes descargarlo o salir.</p>

            <div class="mt-6">
                <!-- Botón para descargar el PDF -->
                <form method="POST" action="{{ route('comprobante.descargar') }}">
                    @csrf
                    <input type="hidden" name="datosComprobante" value="{{ json_encode($datosComprobante) }}">
                    <x-button>
                        {{ __('Descargar PDF') }}
                    </x-button>
                </form>

                <!-- Botón para regresar al dashboard -->
                <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                    {{ __('Salir') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
