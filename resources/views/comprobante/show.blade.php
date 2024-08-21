<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-2xl font-bold mb-4 text-center text-gray-700 dark:text-gray-100">
                Comprobante de Venta
            </h1>

            <div class="mb-4 border-t border-gray-300 dark:border-gray-600"></div>

            <div class="text-left">
                <p class="text-gray-700 dark:text-gray-300"><strong>Descripción:</strong> {{ $datos['descripcion'] }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Total:</strong> ${{ number_format($datos['total'], 2) }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Fecha de Emisión:</strong> {{ $datos['fecha_emision'] }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Modelo del Auto:</strong> {{ $datos['auto'] }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Marca del Auto:</strong> {{ $datos['marca'] }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Número de Serie:</strong> {{ $datos['numero_serie'] }}</p>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Volver al Inicio
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
