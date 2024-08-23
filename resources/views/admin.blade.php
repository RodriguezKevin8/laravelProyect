<div class="p-6 lg:p-8  bg-[#001233] dark:bg-gradient-to-bl border-b border-gray-200 dark:border-gray-700 px-6" >
    <h1 class="mt-8 text-2xl font-medium text-gray-300 dark:text-white">
        Bienvenido a las opciones de administrador.
    </h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8" >
    
    <div class="bg-[#001233] text-gray-300 shadow-lg rounded-lg p-6" >
        <h2 class="text-xl font-semibold">Agregar Usuario</h2>
        <p class="mt-4">Administra y agrega nuevos usuarios al sistema.</p>
        <a href="{{ route('register') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>

    <div class="bg-[#001233] text-gray-300 shadow-lg rounded-lg p-6" ">
        <h2 class="text-xl font-semibold">Modelo</h2>
        <p class="mt-4">Gestiona los modelos de los vehículos.</p>
        <a href="{{ route('modelos.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>

    <div class="bg-[#001233] text-gray-300 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold">Marca</h2>
        <p class="mt-4">Administra las marcas disponibles.</p>
        <a href="{{ route('marcas.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>

    <div class="bg-[#001233] text-gray-300 shadow-lg rounded-lg p-6" >
        <h2 class="text-xl font-semibold">Repuesto</h2>
        <p class="mt-4">Gestiona los repuestos y piezas.</p>
        <a href="{{ route('repuestos.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>

    <div class="bg-[#001233] text-gray-300 shadow-lg rounded-lg p-6" >
        <h2 class="text-xl font-semibold">Proveedor</h2>
        <p class="mt-4">Administra los proveedores asociados.</p>
        <a href="{{ route('proveedores.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>

    <div class="bg-[#001233] text-gray-300 shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold">Autos</h2>
        <p class="mt-4">Administra los autos asociados.</p>
        <a href="{{ route('autos.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>
    
</div>

<script>
    console.log("Estoy en dashboard de vendedor");
</script>
