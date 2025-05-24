@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Naturaleza</h2>
        <a href="{{ route('naturaleza.create') }}">
            <x-button>
                Nueva Naturaleza
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
                @forelse($naturalezas as $naturaleza)
                    <tr>
                        <td class="px-6 py-4">{{ $naturaleza->nombre }}</td>
                        <td class="px-6 py-4">{{ Str::limit($naturaleza->descripcion, 100) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('naturaleza.edit', $naturaleza->id_naturaleza) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center">No hay naturalezas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection