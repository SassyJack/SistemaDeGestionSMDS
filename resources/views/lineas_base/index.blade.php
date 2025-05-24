@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Líneas Base</h2>
        <a href="{{ route('lineas_base.create') }}">
            <x-button>
                Nueva Línea Base
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
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($lineasBase as $lineaBase)
                    <tr>
                        <td class="px-6 py-4">{{ $lineaBase->nombre }}</td>
                        <td class="px-6 py-4">{{ Str::limit($lineaBase->Linea_base, 100) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('lineas_base.edit', $lineaBase->id_linea_base) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center">No hay líneas base registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection