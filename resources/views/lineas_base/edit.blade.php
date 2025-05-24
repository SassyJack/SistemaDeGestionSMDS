@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Editar Línea Base</h2>

        <form action="{{ route('lineas_base.update', $lineaBase->id_linea_base) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $lineaBase->nombre) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="Linea_base" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="Linea_base" id="Linea_base" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('Linea_base', $lineaBase->Linea_base) }}</textarea>
            </div>

            <div class="flex justify-end space-x-4 mt-4">
                <a href="{{ route('lineas_base.index') }}"
                   class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 hover:text-white border-2 border-blue-700 shadow-md transition duration-300 ease-in-out hover:shadow-lg">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 hover:text-white border-2 border-blue-700 shadow-md transition duration-300 ease-in-out hover:shadow-lg">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection