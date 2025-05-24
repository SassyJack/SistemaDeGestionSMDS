@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Personas</h2>
        <a href="{{ route('personas.create') }}">
            <x-button>
                Nueva Persona
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
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Rol</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($personas as $persona)
                    <tr>
                        <td class="px-6 py-4">{{ $persona->id_persona }}</td>
                        <td class="px-6 py-4">{{ $persona->nombre }}</td>
                        <td class="px-6 py-4">{{ $persona->rol ? $persona->rol->nombre : 'Sin rol' }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('personas.edit', $persona) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection