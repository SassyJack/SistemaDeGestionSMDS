@extends('app')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <h2 class="text-2xl font-semibold leading-tight mb-5">Editar Proyecto</h2>

        <form action="{{ route('proyectos.update', $proyecto) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                    Título
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="titulo" 
                       type="text" 
                       name="titulo" 
                       value="{{ old('titulo', $proyecto->titulo) }}" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="actividad">
                    Actividad
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                          id="actividad" 
                          name="actividad" 
                          required>{{ old('actividad', $proyecto->actividad) }}</textarea>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                        Fecha Inicio
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px3- text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="fecha_inicio" 
                           type="date" 
                           name="fecha_inicio" 
                           value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" 
                           required>
                </div>

                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_fin">
                        Fecha Fin
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="fecha_fin" 
                           type="date" 
                           name="fecha_fin" 
                           value="{{ old('fecha_fin', $proyecto->fecha_fin) }}" 
                           required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="presupuesto">
                    Presupuesto
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="presupuesto" 
                       type="number" 
                       step="0.01" 
                       name="presupuesto" 
                       value="{{ old('presupuesto', $proyecto->presupuesto) }}" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="codigo_SSEPI">
                    Código SSEPI
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="codigo_SSEPI" 
                       type="number" 
                       name="codigo_SSEPI" 
                       value="{{ old('codigo_SSEPI', $proyecto->codigo_SSEPI) }}" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_estado">
                    Estado
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_estado" 
                        name="id_estado" 
                        required>
                    <option value="">Seleccione un estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id_estado }}" {{ old('id_estado', $proyecto->id_estado) == $estado->id_estado ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_naturaleza">
                    Naturaleza
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_naturaleza" 
                        name="id_naturaleza" 
                        required>
                    <option value="">Seleccione una naturaleza</option>
                    @foreach($naturalezas as $naturaleza)
                        <option value="{{ $naturaleza->id_naturaleza }}" {{ old('id_naturaleza', $proyecto->id_naturaleza) == $naturaleza->id_naturaleza ? 'selected' : '' }}>
                            {{ $naturaleza->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="codigo_rubro">
                    Código Rubro
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="codigo_rubro" 
                        name="codigo_rubro" 
                        required>
                    <option value="">Seleccione un rubro</option>
                    @foreach($rubros as $rubro)
                        <option value="{{ $rubro->codigo_rubro }}" {{ old('codigo_rubro', $proyecto->codigo_rubro) == $rubro->codigo_rubro ? 'selected' : '' }}>
                            {{ $rubro->codigo_rubro }} - {{ $rubro->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_sector">
                    Sector
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_sector" 
                        name="id_sector" 
                        required>
                    <option value="">Seleccione un sector</option>
                    @foreach($sectores as $sector)
                        <option value="{{ $sector->id_sector }}" {{ old('id_sector', $proyecto->id_sector) == $sector->id_sector ? 'selected' : '' }}>
                            {{ $sector->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_linea_base">
                    Línea Base
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_linea_base" 
                        name="id_linea_base" 
                        required>
                    <option value="">Seleccione una línea base</option>
                    @foreach($lineasBase as $lineaBase)
                        <option value="{{ $lineaBase->id_linea_base }}" {{ old('id_linea_base', $proyecto->id_linea_base) == $lineaBase->id_linea_base ? 'selected' : '' }}>
                            {{ $lineaBase->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
            <a href="{{ route('proyectos.index') }}">
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