@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Seguimiento de Proyectos</h2>
        <a href="{{ route('seguimiento_proyectos.create') }}">
            <x-button>
                Nuevo Seguimiento
            </x-button>
        </a>
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
                    <th class="px-6 py-3 text-left">Interventor</th>
                    <th class="px-6 py-3 text-left">Usuario</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                    <th class="px-6 py-3 text-left">% Avance</th>
                    <th class="px-6 py-3 text-left">Fecha Modificación</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($seguimientos as $seguimiento)
                    <tr>
                        <td class="px-6 py-4">{{ $seguimiento->proyecto->titulo }}</td>
                        <td class="px-6 py-4">{{ $seguimiento->interventor->persona->nombre }}</td>
                        <td class="px-6 py-4">{{ $seguimiento->usuario->persona->nombre }}</td>
                        <td class="px-6 py-4">{{ Str::limit($seguimiento->descripcion, 50) }}</td>
                        <td class="px-6 py-4">
                            <x-progress-bar :percent="$seguimiento->porcentaje_avance" />
                        </td>
                        <td class="px-6 py-4">{{ $seguimiento->fecha_modificacion }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('seguimiento_proyectos.edit', $seguimiento) }}" class="text-blue-500 hover:underline mr-2">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center">No hay seguimientos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection