<div class="nav flex-column">
    <div class="position-sticky top-0 bg-white py-2 z-index-1000 border-bottom mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-primary w-100">
            <i class="fas fa-home me-2"></i>Menú Principal
        </a>
    </div>

    @php
        $menu = [
            'Gestión de Proyectos' => [
                'Proyectos',
                'Seguimiento Proyectos',
                'Metas',
                'Lineas Base',
                'Naturaleza'
            ],
            'Gestión Financiera' => [
                'Contratos',
                'Rubros',
                'Tipo Rubros',
                'Formas Pago'
            ],
            'Personal' => [
                'Contratistas',
                'Interventores',
                'Personas'
            ],
            'Configuración' => [
                'Especialidades',
                'Sectores',
                'Roles',
                'Usuarios',
                'Historial Cambios'
            ]
        ];
    @endphp

    @foreach ($menu as $categoria => $items)
        <div class="nav-item mb-3">
            <a class="nav-link fw-bold" href="#categoria_{{ strtolower(str_replace(' ', '_', $categoria)) }}" 
               data-bs-toggle="collapse" role="button" aria-expanded="false">
                <i class="fas fa-chevron-right me-2"></i>{{ $categoria }}
            </a>
            <div class="collapse" id="categoria_{{ strtolower(str_replace(' ', '_', $categoria)) }}">
                <div class="nav flex-column ms-3 mt-2">
                    @foreach ($items as $item)
                        <div class="nav-item mb-2">
                            <a class="nav-link" href="#{{ strtolower(str_replace(' ', '_', $item)) }}" 
                               data-bs-toggle="collapse" role="button">
                                <span class="me-2"></span>{{ $item }}
                            </a>
                            <div class="collapse" id="{{ strtolower(str_replace(' ', '_', $item)) }}">
                                <div class="nav flex-column ms-3">
                                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item))).'/create' }}">
                                        ➕ Crear
                                    </a>
                                    @if($item != 'Historial Cambios')
                                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item))) }}">
                                        ✏️ Listar/Editar
                                    </a>
                                    @else
                                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item))) }}">
                                        📋 Ver Historial
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    <div class="border-top my-3"></div>
    <form action="{{ route('logout') }}" method="POST" class="px-3">
        @csrf
        <x-button type="submit" class="w-100 bg-red-500 hover:bg-red-600">
            Cerrar Sesión
        </x-button>
    </form>
</div>
