@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Usuarios</h2>
        <a href="{{ route('usuarios.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-200 text-black text-sm font-medium rounded-2xl shadow hover:bg-blue-300 transition duration-150 ease-in-out no-underline">
        Nuevo Usuario
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
                    <th class="px-6 py-3 text-left">Persona</th>
                    <th class="px-6 py-3 text-left">Estado</th>
                    <th class="px-6 py-3 text-left">Fecha de Creación</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="px-6 py-4">{{ $usuario->persona ? $usuario->persona->nombre : 'Sin persona' }}</td>
                        <td class="px-6 py-4">{{ $usuario->estado ? $usuario->estado->nombre : 'Sin estado' }}</td>
                        <td class="px-6 py-4">{{ $usuario->fecha_creacion }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection