@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Crear Nueva Línea Base</h2>

        <form action="{{ route('lineas_base.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="Linea_base" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="Linea_base" id="Linea_base" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('Linea_base') }}</textarea>
            </div>

            <div class="flex justify-end space-x-4 bg-white p-4">
                <a href="{{ route('lineas_base.index') }}">
                    <x-button>
                        Cancelar
                    </x-button>
                </a>
                <button type="submit">
                    <x-button>
                        Guardar
                    </x-button>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection