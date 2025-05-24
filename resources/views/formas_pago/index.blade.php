@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Formas de Pago</h1>
        <a href="{{ route('formas_de_pago.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Crear Nueva Forma de Pago
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">Nombre</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">Descripción</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formasPago as $formaPago)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $formaPago->id_forma_pago }}</td>
                        <td class="px-6 py-4 border-b">{{ $formaPago->nombre }}</td>
                        <td class="px-6 py-4 border-b">{{ $formaPago->descripcion }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('formas_de_pago.edit', $formaPago) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

// Cambiar todas las ocurrencias de
route('formas_pago.xxx')
// por
route('formas_de_pago.xxx')