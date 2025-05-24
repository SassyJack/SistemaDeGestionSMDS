@extends('app')

@section('content')
<div class="container mx-auto px-4 sm:px-8 w-full">
    <div class="py-8">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold leading-tight">Proyectos</h2>
            <a href="{{ route('proyectos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Nuevo Proyecto
            </a>
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