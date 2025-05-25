@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Crear Nuevo Seguimiento de Proyecto</h2>

        <form action="{{ route('seguimiento_proyectos.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="id_proyecto" class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select name="id_proyecto" id="id_proyecto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione un proyecto</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id_proyecto }}">{{ $proyecto->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_interventor" class="block text-sm font-medium text-gray-700">Interventor</label>
                <select name="id_interventor" id="id_interventor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione un interventor</option>
                    @foreach($interventores as $interventor)
                        <option value="{{ $interventor->id_interventor }}">{{ $interventor->persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select name="id_usuario" id="id_usuario" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}">{{ $usuario->persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
            </div>

            <div>
                <label for="porcentaje_avance" class="block text-sm font-medium text-gray-700">Porcentaje de Avance (%)</label>
                <input type="number" name="porcentaje_avance" id="porcentaje_avance" min="0" max="100" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="fecha_modificacion" class="block text-sm font-medium text-gray-700">Fecha de Modificación</label>
                <input type="datetime-local" name="fecha_modificacion" id="fecha_modificacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('seguimiento_proyectos.index') }}">
                    <x-button>
                        Cancelar
                    </x-button>
                </a>
                <x-button type="submit">
                    Crear
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection