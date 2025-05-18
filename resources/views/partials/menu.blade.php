<div class="nav flex-column">
    @php
        $menu = [
            'Contratistas' => [],
            'Contratos' => [],
            'Entidades' => [],
            'Entidades Tipos' => [],
            'Especialidades' => [],
            'Interventores' => [],
            'Metas' => [],
            'Proyectos' => [],
            'Roles' => [],
            'Rubros' => [],
            'Tipos Rubros' => [],
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
                    <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '_', $item))) }}">
                        ✏️ Listar/Editar
                    </a>
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
