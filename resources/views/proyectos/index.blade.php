@extends('app')

@section('content')
<div class="container mx-auto px-4 sm:px-8 w-full">
    <div class="py-8">
        <div class="flex justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Proyectos</h2>
            <a href="{{ route('proyectos.create') }}">
                <x-button>
                    Crear Nuevo Proyecto
                </x-button>
            </a>
        </div>
        
        <!-- Formulario de Filtros -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-medium text-gray-800">Filtros de Búsqueda</h3>
            </div>
            <form action="{{ route('proyectos.index') }}" method="GET" class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="id_estado" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="id_estado" id="id_estado" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            <option value="">Seleccionar estado</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id_estado }}" {{ request('id_estado') == $estado->id_estado ? 'selected' : '' }}>
                                    {{ $estado->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
                            <input 
                                type="date" 
                                name="fecha_inicio_desde" 
                                value="{{ request('fecha_inicio_desde') }}" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                placeholder="Seleccionar fecha">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
                            <input 
                                type="date" 
                                name="fecha_fin_desde" 
                                value="{{ request('fecha_fin_desde') }}" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                placeholder="Seleccionar fecha">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <x-button type="submit" class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Aplicar Filtros
                    </x-button>
                    <x-button type="submit" name="clear_filters" class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Limpiar Filtros
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