@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Editar Contratista</h2>

        <form action="{{ route('contratistas.update', $contratista) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="id_persona" class="block text-sm font-medium text-gray-700">Persona</label>
                <select name="id_persona" id="id_persona" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="">Seleccione una persona</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id_persona }}" {{ $contratista->id_persona == $persona->id_persona ? 'selected' : '' }}>
                            {{ $persona->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="razon_social" class="block text-sm font-medium text-gray-700">Razón Social</label>
                <input type="text" name="razon_social" id="razon_social" value="{{ $contratista->razon_social }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('contratistas.index') }}">
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