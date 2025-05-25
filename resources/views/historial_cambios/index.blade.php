@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Historial de Cambios</h2>
    </div>

    <!-- Filtros -->
    <div class="bg-white shadow-md rounded-lg p-4 mb-6">
        <h3 class="text-lg font-semibold mb-3">Filtros</h3>
        <form action="{{ route('historial_cambios.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="id_proyecto" class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select name="id_proyecto" id="id_proyecto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">Todos los proyectos</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id_proyecto }}" {{ request('id_proyecto') == $proyecto->id_proyecto ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select name="id_usuario" id="id_usuario" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">Todos los usuarios</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}" {{ request('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->persona->nombre ?? 'Usuario sin nombre' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="fecha_desde" class="block text-sm font-medium text-gray-700">Fecha desde</label>
                <input type="date" name="fecha_desde" id="fecha_desde" value="{{ request('fecha_desde') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label for="fecha_hasta" class="block text-sm font-medium text-gray-700">Fecha hasta</label>
                <input type="date" name="fecha_hasta" id="fecha_hasta" value="{{ request('fecha_hasta') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="md:col-span-4 flex justify-end space-x-2">
                <x-button type="submit">
                    Filtrar
                </x-button>
                <x-button type="button" onclick="window.location='{{ route('historial_cambios.index') }}'">
                    Limpiar
                </x-button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">Proyecto</th>
                    <th class="px-6 py-3 text-left">Usuario</th>
                    <th class="px-6 py-3 text-left">Fecha y Hora</th>
                    <th class="px-6 py-3 text-left">Cambio Realizado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($historialCambios as $historialCambio)
                    <tr>
                        <td class="px-6 py-4">{{ $historialCambio->proyecto->titulo ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $historialCambio->usuario->persona->nombre ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ date('d/m/Y H:i', strtotime($historialCambio->fecha)) }}</td>
                        <td class="px-6 py-4">{{ $historialCambio->cambio }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center">No hay registros de cambios.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection