<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 px-6">
    

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Bienvenido a las opciones de administrador, configura conforme a las necesidades basicas de tu programa.
    </h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
    
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Agregar Usuario</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Administra y agrega nuevos usuarios al sistema.</p>
        <a href="{{ route('register') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
        </a>
    </div>

  
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Modelo</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Gestiona los modelos de los vehículos.</p>
        <a href="{{ route('modelos.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
        </a>
    </div>


    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Marca</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Administra las marcas disponibles.</p>
        <a href="{{ route('marcas.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
        </a>
    </div>

  
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Repuesto</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Gestiona los repuestos y piezas.</p>
        <a href="{{ route('repuestos.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
        </a>
    </div>

    
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Proveedor</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Administra los proveedores asociados.</p>
        <a href="{{ route('proveedores.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Autos</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Administra los autos asociados.</p>
        <a href="{{ route('autos.index') }}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Agregar</button>
        </a>
    </div>

    
</div>

<script>
    console.log("Estoy en dashboard de vendedor");
</script>
