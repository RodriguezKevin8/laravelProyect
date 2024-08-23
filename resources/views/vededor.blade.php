<div class="p-6 lg:p-8 bg-[#ffffff] dark:bg-[#001233] dark:bg-gradient-to-bl dark:from-[#001233]/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 px-6">
    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white text-center">
        Bienvenido a las opciones de vendedor.
    </h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 h-80">
    
    <div class="bg-[#001233] shadow-lg rounded-lg p-6 h-min">
        <h2 class="text-xl font-semibold text-[#e5e5e5] dark:text-[#e5e5e5]">Agregar Cliente</h2>
        <p class="text-[#e5e5e5] dark:text-[#b0b0b0] mt-4">Administra y agrega nuevos clientes al sistema.</p>
        <a href="{{ route('clientes.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div> 

    <div class="bg-[#001233] shadow-lg rounded-lg p-6 h-min">
        <h2 class="text-xl font-semibold text-[#e5e5e5] dark:text-[#e5e5e5]">Autos</h2>
        <p class="text-[#e5e5e5] dark:text-[#b0b0b0] mt-4">Gestiona la ventas de los vehículos.</p>
        <a href="{{ route('autoventas.index') }}">
            <button class="mt-4 bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Agregar</button>
        </a>
    </div>

</div>
