<div class="p-6 lg:p-8 bg-[#ffffff] dark:bg-[#001233] dark:bg-gradient-to-bl dark:from-[#001233]/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 px-6">
    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white text-center">
        Bienvenido a las opciones de mecanico.
    </h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 h-80">
    
    <div class="bg-[#001233] shadow-lg rounded-lg p-6 h-min">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">ver vehiculos</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Administra y da Mantenimiento a vehiculos.</p>
        <a href="{{ route('mecanicos.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ver</button>
        </a>
    </div> 
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Ver mantenimientos de vehiculos</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Revisa los mantenimientos que se le han hecho a cada vehiculo.</p>
        <a href="{{ route('auto_mantenimientos.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ver</button>
        </a>
    </div> 
    

    
    
</div>

