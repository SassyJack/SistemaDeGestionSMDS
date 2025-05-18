<div class="nav flex-column">
    @php
        $menu = [
            'Contratistas' => [],
            'Contratos' => [],
            'Entidades' => ['Entidades Tipos'],
            'Especialidades' => [],
            'Interventores' => [],
            'Metas' => [],
            'Proyectos' => [],
            'Roles' => [],
            'Rubros' => [],
            'Tipo Rubros' => [],
            'Sectores' => [],
            'Seguimiento Proyectos' => [],
            'Usuarios' => ['Roles Usuarios'],
            'Historial Cambios' => [],
        ];
    @endphp

    @foreach ($menu as $item => $subItems)
        <div class="nav-item mb-2">
            <a class="nav-link" href="#{{ strtolower(str_replace(' ', '_', $item)) }}" 
               data-bs-toggle="collapse" role="button">
                <span class="me-2"></span>{{ $item }}
            </a>
            <div class="collapse" id="{{ strtolower(str_replace(' ', '_', $item)) }}">
                <div class="nav flex-column ms-3">
                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item)).'/create') }}">
                        ➕ Crear
                    </a>
                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item)).'/edit') }}">
                        ✏️ Editar
                    </a>
                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item))) }}">
                        👁️ Visualizar
                    </a>

                    @if(count($subItems) > 0)
                        <div class="border-top my-2"></div>
                        @foreach ($subItems as $sub)
                            <div class="nav-item">
                                <span class="nav-link fw-bold">{{ $sub }}</span>
                                <div class="nav flex-column ms-3">
                                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $sub)).'/create') }}">
                                        ➕ Crear
                                    </a>
                                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $sub)).'/edit') }}">
                                        ✏️ Editar
                                    </a>
                                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $sub))) }}">
                                        👁️ Visualizar
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <div class="border-top my-3"></div>
    <form action="{{ route('logout') }}" method="POST" class="px-3">
        @csrf
        <button type="submit" class="btn btn-outline-danger w-100">
            🚪 Cerrar Sesión
        </button>
    </form>
</div>
