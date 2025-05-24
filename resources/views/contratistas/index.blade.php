@extends('app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Contratistas</h1>
        <a href="{{ route('contratistas.create') }}">
            <x-button>
                Nuevo Contratista
            </x-button>
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">Persona</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">Razón Social</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratistas as $contratista)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $contratista->id_contratista }}</td>
                        <td class="px-6 py-4 border-b">{{ $contratista->persona->nombre ?? 'N/A' }}</td>
                        <td class="px-6 py-4 border-b">{{ $contratista->razon_social }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('contratistas.edit', $contratista) }}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection