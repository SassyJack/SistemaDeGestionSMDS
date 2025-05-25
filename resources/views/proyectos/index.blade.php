@extends('app')

@section('content')
<div class="container mx-auto px-4 sm:px-8 w-full">
    <div class="py-8">
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Proyectos</h2>
            <a href="{{ route('proyectos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Nuevo Proyecto
            </a>
        </div>
        
        <!-- Formulario de Filtros -->
        <div class="bg-white p-4 mb-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-3">Filtros</h3>
            <form action="{{ route('proyectos.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="id_estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <select name="id_estado" id="id_estado" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">Todos los estados</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id_estado }}" {{ request('id_estado') == $estado->id_estado ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Inicio</label>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <input type="date" name="fecha_inicio_desde" placeholder="Desde" value="{{ request('fecha_inicio_desde') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <input type="date" name="fecha_inicio_hasta" placeholder="Hasta" value="{{ request('fecha_inicio_hasta') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Fin</label>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <input type="date" name="fecha_fin_desde" placeholder="Desde" value="{{ request('fecha_fin_desde') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <input type="date" name="fecha_fin_hasta" placeholder="Hasta" value="{{ request('fecha_fin_hasta') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </div>
                    </div>
                </div>
                
                <div class="md:col-span-3 flex justify-end space-x-3">
                    <x-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filtrar
                    </x-button>
                    <x-button tag="a" href="{{ route('proyectos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Limpiar
                    </x-button>
                </div>
            </form>
        </div>
        
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Título</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Inicio</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Fin</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Presupuesto</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Estado</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Naturaleza</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sector</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Línea Base</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Código Rubro</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Código SSEPI</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actividad</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyectos as $proyecto)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->titulo }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->fecha_inicio }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->fecha_fin }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ number_format($proyecto->presupuesto, 2) }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->estado->nombre }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->naturaleza->nombre }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->sector->nombre }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->lineaBase->nombre }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->codigo_rubro }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->codigo_SSEPI }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $proyecto->actividad }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('proyectos.edit', $proyecto) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection