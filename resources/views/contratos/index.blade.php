@extends('app')

@section('content')
<div class="container mx-auto px-4 sm:px-8 w-full">
    <div class="py-8">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold leading-tight">Contratos</h2>
            <a href="{{ route('contratos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Nuevo Contrato
            </a>
        </div>
        
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Número Contrato</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Celebración</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Expedición</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contratista</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Proyecto</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Objeto</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Valor Contrato</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Valor Anticipo</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Duración</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Forma Pago</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Estado</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contratos as $contrato)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->numero_contrato }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->fecha_celebracion }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->fecha_expedicion }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->contratista->persona->nombre ?? 'N/A' }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->proyecto->titulo ?? 'N/A' }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ Str::limit($contrato->objeto, 100) }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ number_format($contrato->valor_contrato, 2) }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ number_format($contrato->valor_anticipo, 2) }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->duracion }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->formaPago->nombre ?? 'N/A' }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $contrato->estado->nombre ?? 'N/A' }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('contratos.edit', $contrato) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection