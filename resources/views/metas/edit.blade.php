@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Editar Meta</h2>

        <form action="{{ route('metas.update', $meta->id_nombre_meta) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $meta->nombre) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="meta_programa" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="meta_programa" id="meta_programa" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('meta_programa', $meta->meta_programa) }}</textarea>
            </div>

            <div class="flex justify-end space-x-4 mt-4">
                <a href="{{ route('metas.index') }}"
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