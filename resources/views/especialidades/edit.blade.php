@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Editar Especialidad</h2>
        
        <form action="{{ route('especialidades.update', $especialidad) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $especialidad->nombre) }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('nombre') @enderror">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('descripcion') @enderror">{{ old('descripcion', $especialidad->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <a href="{{ route('especialidades.index') }}">
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