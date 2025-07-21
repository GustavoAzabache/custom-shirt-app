<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Últimos diseños subidos') }}
                </h2>
            </x-slot>

                @foreach ($designs as $design)
                    <div class="border p-4 rounded shadow mb-4">
                        <h4 class="font-semibold">{{ $design->name }}</h4>
                        <img src="{{ asset('storage/' . $design->route) }}" width="200" alt="{{ $design->name }}">
                        <h4>Subido por: {{ $design->user->name}}</h4>
                        <br>
                        <x-secondary-button>
                            Comprar
                        </x-secondary-button>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
