@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Listado de Líneas Base</h4>
                        <a href="{{ route('lineas_base.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nueva Línea Base
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lineasBase as $lineaBase)
                                    <tr>
                                        <td>{{ $lineaBase->id_linea_base }}</td>
                                        <td>{{ $lineaBase->nombre }}</td>
                                        <td>{{ Str::limit($lineaBase->Linea_base, 100) }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('lineas_base.edit', $lineaBase->id_linea_base) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No hay líneas base registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection