<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Torneos') }}
        </h2>
    </x-slot>

    <x-form-layout>
        <form method="POST" action="{{ route('torneos.store') }}">
            @csrf

            <!-- Form Fields -->
            <div class="mb-4">
                <x-input-label for="nombre" :value="__('Nombre:')"/>
                <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre')" required autofocus autocomplete/>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="mb-4">
                <select-dependiente 
                    :initialTiposTorneo='@json($TiposTorneo)'></select-dependiente>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Crear Torneo') }}
                </x-primary-button>
            </div>
        </form>
    </x-form-layout>
</x-app-layout>
