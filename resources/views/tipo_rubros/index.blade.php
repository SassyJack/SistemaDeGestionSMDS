@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Tipos de Rubros</h2>
        <a href="{{ route('tipo_rubros.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Nuevo Tipo de Rubro
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
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($tipoRubros as $tipoRubro)
                    <tr>
                        <td class="px-6 py-4">{{ $tipoRubro->nombre }}</td>
                        <td class="px-6 py-4">{{ $tipoRubro->descripcion }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('tipo_rubros.edit', $tipoRubro) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(145deg, #2563eb, #1d4ed8);
        color: white !important;
        box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1), 0 2px 4px -1px rgba(37, 99, 235, 0.06);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 10px -1px rgba(37, 99, 235, 0.2), 0 4px 6px -1px rgba(37, 99, 235, 0.1);
        background: linear-gradient(145deg, #1d4ed8, #1e40af);
    }

    .me-2 {
        margin-right: 0.5rem;
    }
</style>
@endsection