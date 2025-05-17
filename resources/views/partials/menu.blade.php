<!-- resources/views/partials/menu.blade.php -->

<ul class="bg-gray-100 p-4 space-y-2 rounded-lg">
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
            'Rubros' => ['Tipos Rubros'],
            'Sectores' => [],
            'Seguimiento Proyectos' => [],
            'Usuarios' => ['Roles Usuarios'],
            'Historial Cambios' => [],
        ];
    @endphp

    @foreach ($menu as $item => $subItems)
        <li class="border-b pb-2">
            <details class="group">
                <summary class="cursor-pointer font-semibold text-blue-700 hover:underline">
                    {{ $item }}
                </summary>
                <ul class="pl-4 mt-2 space-y-1 text-sm text-gray-700">
                    <li><a href="{{ url(strtolower(str_replace(' ', '_', $item)).'/create') }}" class="hover:text-blue-500">➕ Crear</a></li>
                    <li><a href="{{ url(strtolower(str_replace(' ', '_', $item)).'/edit') }}" class="hover:text-blue-500">✏️ Editar</a></li>
                    <li><a href="{{ url(strtolower(str_replace(' ', '_', $item))) }}" class="hover:text-blue-500">👁️ Visualizar</a></li>

                    @foreach ($subItems as $sub)
                        <li class="mt-2 ml-4 font-medium text-gray-900">{{ $sub }}
                            <ul class="pl-4 text-sm text-gray-700">
                                <li><a href="{{ url(strtolower(str_replace(' ', '_', $sub)).'/create') }}" class="hover:text-blue-500">➕ Crear</a></li>
                                <li><a href="{{ url(strtolower(str_replace(' ', '_', $sub)).'/edit') }}" class="hover:text-blue-500">✏️ Editar</a></li>
                                <li><a href="{{ url(strtolower(str_replace(' ', '_', $sub))) }}" class="hover:text-blue-500">👁️ Visualizar</a></li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </details>
        </li>
    @endforeach
</ul>
