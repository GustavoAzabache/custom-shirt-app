<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Editar diseño') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <form method="POST" action="{{ route('design_update', $design->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Importante para simular método PUT --}}

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="name">Nombre</label>
                        <input id="name" name="name" value="{{ old('name', $design->name) }}"
                               class="block w-full mt-1" type="text" required>
                    </div>

                    <!-- Imagen -->
                    <div class="mb-4">
                        <label>Imagen actual:</label><br>
                        <img src="{{ asset('storage/' . $design->route) }}" width="200" alt="{{ $design->name }}">
                    </div>

                    <div class="mb-4">
                        <label for="image">Nueva imagen (opcional):</label>
                        <input id="image" name="image" type="file" accept="image/*" class="block mt-1 w-full">
                    </div>

                    <!-- Público -->
                    <div class="mb-4">
                        <label for="is_public">
                            <input type="checkbox" id="is_public" name="is_public" value="1"
                                {{ $design->is_public ? 'checked' : '' }}>
                            Hacer privado
                        </label>
                    </div>

                    <!-- Botón -->
                    <x-primary-button type="submit">Actualizar</x-primary-button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
