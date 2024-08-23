<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('marcas.update', $marca->id) }}">
            @csrf
            @method('PUT')

            <div style="background-image: url('images/Welcome.jpg'); background-size: cover; background-position: center;">
                <x-label for="marca" value="Nombre de la Marca" class="text-[#e5e5e5]" />
                <x-input id="marca" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="marca" value="{{ $marca->marca }}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('marcas.index') }}" class="underline text-sm text-[#e5e5e5] hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Cancelar') }}
                </a>

                <x-button class="ml-4 bg-[#001233] hover:bg-[#002347] text-[#e5e5e5]">
                    {{ __('Actualizar Marca') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
