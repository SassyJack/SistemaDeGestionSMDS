@extends('app')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <h2 class="text-2xl font-semibold leading-tight mb-5">Editar Contrato</h2>

        <form action="{{ route('contratos.update', $contrato) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="numero_contrato">
                    Número de Contrato
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="numero_contrato" 
                       type="text" 
                       name="numero_contrato" 
                       value="{{ old('numero_contrato', $contrato->numero_contrato) }}" 
                       required>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_celebracion">
                        Fecha de Celebración
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="fecha_celebracion" 
                           type="date" 
                           name="fecha_celebracion" 
                           value="{{ old('fecha_celebracion', $contrato->fecha_celebracion) }}" 
                           required>
                </div>

                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_expedicion">
                        Fecha de Expedición
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="fecha_expedicion" 
                           type="date" 
                           name="fecha_expedicion" 
                           value="{{ old('fecha_expedicion', $contrato->fecha_expedicion) }}" 
                           required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_contratista">
                    Contratista
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_contratista" 
                        name="id_contratista" 
                        required>
                    <option value="">Seleccione un contratista</option>
                    @foreach($contratistas as $contratista)
                        <option value="{{ $contratista->id_contratista }}" {{ old('id_contratista', $contrato->id_contratista) == $contratista->id_contratista ? 'selected' : '' }}>
                            {{ $contratista->persona->nombre }} - {{ $contratista->razon_social }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_proyecto">
                    Proyecto
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_proyecto" 
                        name="id_proyecto" 
                        required>
                    <option value="">Seleccione un proyecto</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id_proyecto }}" {{ old('id_proyecto', $contrato->id_proyecto) == $proyecto->id_proyecto ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="objeto">
                    Objeto
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                          id="objeto" 
                          name="objeto" 
                          required>{{ old('objeto', $contrato->objeto) }}</textarea>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="valor_contrato">
                        Valor del Contrato
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="valor_contrato" 
                           type="number" 
                           step="0.01" 
                           name="valor_contrato" 
                           value="{{ old('valor_contrato', $contrato->valor_contrato) }}" 
                           required>
                </div>

                <div class="w-1/2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="valor_anticipo">
                        Valor del Anticipo
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="valor_anticipo" 
                           type="number" 
                           step="0.01" 
                           name="valor_anticipo" 
                           value="{{ old('valor_anticipo', $contrato->valor_anticipo) }}" 
                           required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion">
                    Duración (días)
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="duracion" 
                       type="number" 
                       name="duracion" 
                       value="{{ old('duracion', $contrato->duracion) }}" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_forma_pago">
                    Forma de Pago
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="id_forma_pago" 
                        name="id_forma_pago" 
                        required>
                    <option value="">Seleccione una forma de pago</option>
                    @foreach($formasPago as $formaPago)
                        <option value="{{ $formaPago->id_forma_pago }}" {{ old('id_forma_pago', $contrato->id_forma_pago) == $formaPago->id_forma_pago ? 'selected' : '' }}>
                            {{ $formaPago->nombre }}
                        </option>
                    @endforeach
                </select>
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
                        <option value="{{ $estado->id_estado }}" {{ old('id_estado', $contrato->id_estado) == $estado->id_estado ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('contratos.index') }}">
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