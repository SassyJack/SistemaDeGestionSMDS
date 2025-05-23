@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Editar Rubro</h2>

        <form action="{{ route('rubros.update', $rubro) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="codigo_rubro" class="block text-sm font-medium text-gray-700">Código de Rubro</label>
                <input type="number" name="codigo_rubro" id="codigo_rubro" 
                       value="{{ $rubro->codigo_rubro }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                       readonly>
            </div>

            <div>
                <label for="id_tipo_rubro" class="block text-sm font-medium text-gray-700">Tipo de Rubro</label>
                <select name="id_tipo_rubro" id="id_tipo_rubro" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione un tipo de rubro</option>
                    @foreach($tipoRubros as $tipoRubro)
                        <option value="{{ $tipoRubro->id_tipo_rubro }}" 
                                {{ $rubro->id_tipo_rubro == $tipoRubro->id_tipo_rubro ? 'selected' : '' }}>
                            {{ $tipoRubro->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $rubro->descripcion }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('rubros.index') }}" 
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