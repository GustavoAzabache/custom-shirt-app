<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sube tu diseño') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('design_form_send') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre del diseño -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="'Nombre del diseño'" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                        @error('name')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Imagen del diseño -->
                    <div class="mb-4">
                        <x-input-label for="image" :value="'Imagen del diseño'" />
                        <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" required />
                        @error('image')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Público -->
                    <div class="mb-4">
                        <x-input-label for="is_public" :value="'¿Deseas hacerlo privado?'" />
                        <input type="hidden" name="is_public" value="0">
                        <input type="checkbox" id="is_public" name="is_public" value="1" class="mt-1" />
                        @error('is_public')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botón -->
                    <div class="mt-4">
                        <x-primary-button>
                            {{ __('Enviar diseño') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
