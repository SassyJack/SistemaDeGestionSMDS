@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Crear Nuevo Interventor</h2>

        <form action="{{ route('interventores.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="id_persona" class="block text-sm font-medium text-gray-700">Persona</label>
                <select name="id_persona" id="id_persona" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione una persona</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="id_especialidad" class="block text-sm font-medium text-gray-700">Especialidad</label>
                <select name="id_especialidad" id="id_especialidad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione una especialidad</option>
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->id_especialidad }}">{{ $especialidad->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nit" class="block text-sm font-medium text-gray-700">NIT</label>
                <input type="text" name="nit" id="nit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('interventores.index') }}">
                    <x-button>
                        Cancelar
                    </x-button>
                </a>
                <x-button type="submit">
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection