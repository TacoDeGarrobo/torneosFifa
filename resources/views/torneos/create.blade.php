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
                <x-input-label for="tipo" :value="__('Modelo de Torneo:')"/>
                <x-select-layout id="tipo" name="tipo" class="mt-1 block w-full" :value="old('tipo')" required>
                    <option value="" selected>Selecciona el modelo de torneo</option>
                    <option value="Liga">
                        Liga
                    </option>
                    <option value="Eliminatoria">
                        Eliminatoria
                    </option>
                    <option value="Liga_y_Eliminatoria">
                        Liga y Eliminatoria
                    </option>
                    <option value="UCL">
                        UCL
                    </option>
                </x-select-layout>
                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="max_equipos" :value="__('Cantidad de equipos:')"/>
                <x-select-layout id="max_equipos" name="max_equipos" class="mt-1 block w-full" :value="old('max_equipos')" required placeholder="Selecciona la cantidad de equipos">
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="32">32</option>
                </x-select-layout>
                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Crear Torneo') }}
                </x-primary-button>
            </div>
        </form>
    </x-form-layout>
</x-app-layout>