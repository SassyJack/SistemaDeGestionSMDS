@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Editar Usuario</h2>

        <form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="id_persona" class="block text-sm font-medium text-gray-700">Persona</label>
                <select name="id_persona" id="id_persona" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione una persona</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ $usuario->id_persona == $persona->id_persona ? 'selected' : '' }}>{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
                <input type="text" name="username" id="username" value="{{ old('username', $usuario->username) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña (dejar en blanco para mantener la actual)</label>
                <input type="password" name="contrasena" id="contrasena" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div>
                <label for="id_estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="id_estado" id="id_estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione un estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id_estado }}" {{ $usuario->id_estado == $estado->id_estado ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-4 bg-white p-4">
                <a href="{{ route('usuarios.index') }}">
                    <x-button>
                        Cancelar
                    </x-button>
                </a>
                <x-button type="submit">
                    Actualizar
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection