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
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                       value="{{ $rubro->nombre }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                       required>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $rubro->descripcion }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('rubros.index') }}">
                    <x-button>
                        Cancelar
                    </x-button>
                </a>
                <x-button type="submit">
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection