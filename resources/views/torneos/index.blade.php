<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Torneos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-lg font-semibold mb-1">Lista de Torneos</h3>
                    <p class="mb-4">Aquí puedes ver todos los torneos disponibles.</p>

                    <a href="{{ route('torneos.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mb-4">
                        Crear Nuevo Torneo 
                    </a>

                    @if ($torneos->isEmpty())
                        <p>No hay torneos disponibles.</p>
                    @else
                        <ul>
                            @foreach ($torneos as $torneo)
                                <li>
                                    <a href="{{ route('torneos.show', $torneo) }}">{{ $torneo->nombre }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>