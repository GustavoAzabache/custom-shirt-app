<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tus Diseños') }}
        </h2>
    </x-slot>

    {{-- Botón usando el componente Blade --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <a href="{{ route('design_create_form') }}">
            <x-primary-button>
                Subir un Nuevo Diseño
            </x-primary-button>
        </a>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($designs as $design)
                        <div class="border p-4 rounded shadow mb-4">
                            <h4 class="font-semibold">{{ $design->name }}</h4>
                            <img src="{{ asset('storage/' . $design->route) }}" width="200" alt="{{ $design->name }}">
                            @if ($design->is_public)
                                <span class="text-sm text-red-600">Privado</span>
                            @else
                                <span class="text-sm text-green-600">Público</span>
                            @endif
                            <br><br>
                            <x-secondary-button>
                                Comprar
                            </x-secondary-button>
                            <p></p>
                            <a href="{{ route('design_edit_form', $design->id) }}">
                                <x-secondary-button>
                                    Editar
                                </x-secondary-button>
                            </a>
                            <form action="{{ route('design_destroy', $design->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este diseño?');">
                                @csrf
                                @method('DELETE')

                                <x-danger-button>
                                    Eliminar
                                </x-danger-button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
