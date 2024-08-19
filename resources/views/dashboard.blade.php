<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editable') }}
        </h2>
    </x-slot>

    <div class="py-12 px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px">
                <!-- Div para Admin -->
                <div id="admin-content" style="display: none;">
                    @include('admin')
                </div>
    
                <!-- Div para Vendedor -->
                <div id="vendedor-content" style="display: none;">
                    @include('vededor')
                </div>
    
                <!-- Div para Mecanico -->
                <div id="mecanico-content" style="display: none;">
                    @include('mecanico')
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
<script>
    // Ocultar todos los contenidos inicialmente
    document.getElementById('admin-content').style.display = 'none';
    document.getElementById('vendedor-content').style.display = 'none';
    document.getElementById('mecanico-content').style.display = 'none';

    // Obtener el valor de id_rol desde localStorage
    let idRol1 = localStorage.getItem('id_rol');
   

    // Verificar el valor de id_rol y mostrar el contenido correspondiente
    if (idRol1 == 1) {
        // Mostrar el contenido de Admin
        document.getElementById('admin-content').style.display = 'block';
    } else if (idRol1 == 2) {
        // Mostrar el contenido de Vendedor
        document.getElementById('vendedor-content').style.display = 'block';
    } else if (idRol1 == 3) {
        // Mostrar el contenido de Mecánico
        document.getElementById('mecanico-content').style.display = 'block';
    } else {
        console.log("ID Rol no reconocido");
    }
</script>

