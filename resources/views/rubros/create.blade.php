@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Crear Nuevo Rubro</h2>

        <form action="{{ route('rubros.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="codigo_rubro" class="block text-sm font-medium text-gray-700">Código de Rubro</label>
                <input type="number" name="codigo_rubro" id="codigo_rubro" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="id_tipo_rubro" class="block text-sm font-medium text-gray-700">Tipo de Rubro</label>
                <select name="id_tipo_rubro" id="id_tipo_rubro" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione un tipo de rubro</option>
                    @foreach($tipoRubros as $tipoRubro)
                        <option value="{{ $tipoRubro->id_tipo_rubro }}">{{ $tipoRubro->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
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