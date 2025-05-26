<div class="nav flex-column max-w-sm mx-auto">
    <div class="bg-white rounded-md shadow-sm border border-gray-200 overflow-hidden flex flex-col">

        {{-- Botón Menú Principal --}}
        <a href="{{ route('dashboard') }}"
           class="btn btn-primary w-full rounded-t-md font-semibold py-3 flex items-center justify-center gap-2"
           style="border-bottom: 1px solid #e5e7eb;"
        >
            <i class="fas fa-home"></i>
            Menú Principal
        </a>

        {{-- Menú --}}
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
            function slugify($string) {
                return strtolower(str_replace(' ', '_', $string));
            }
        @endphp

        <div x-data="{ openCategory: null, openItem: null }" class="p-6 space-y-6 flex-grow overflow-auto">
            @foreach ($menu as $categoria => $items)
                @php $catSlug = slugify($categoria); @endphp
                <div>
                    <button
                        @click="openCategory = (openCategory === '{{ $catSlug }}') ? null : '{{ $catSlug }}'; openItem = null"
                        class="flex items-center w-full text-left font-semibold text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 transition duration-200 mb-3"
                    >
                        <i :class="openCategory === '{{ $catSlug }}' ? 'fas fa-chevron-down' : 'fas fa-chevron-right'" class="mr-3 text-sm"></i>
                        <span class="text-lg">{{ $categoria }}</span>
                    </button>

                    <div
                        x-show="openCategory === '{{ $catSlug }}'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-screen"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 max-h-screen"
                        x-transition:leave-end="opacity-0 max-h-0"
                        style="overflow: hidden;"
                        class="ml-6 mt-2 flex flex-col space-y-2 mb-4"
                    >
                        @foreach ($items as $item)
                            @php $itemSlug = slugify($item); @endphp
                            <div>
                                <button
                                    @click="openItem = (openItem === '{{ $itemSlug }}') ? null : '{{ $itemSlug }}'"
                                    class="flex items-center w-full text-left text-gray-600 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition duration-200 mb-2"
                                >
                                    <i :class="openItem === '{{ $itemSlug }}' ? 'fas fa-folder-open' : 'fas fa-folder'" class="mr-2 text-sm"></i>
                                    <span class="text-base">{{ $item }}</span>
                                </button>

                                <div
                                    x-show="openItem === '{{ $itemSlug }}'"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-screen"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 max-h-screen"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    style="overflow: hidden;"
                                    class="ml-6 mt-2 flex flex-col space-y-2"
                                >
                                    @if($item != 'Historial Cambios')
                                        <a href="{{ url($itemSlug.'/create') }}"
                                           style="text-decoration: none;"
                                           class="inline-block px-3 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-150 font-medium text-sm"
                                        >
                                            ➕ Crear
                                        </a>
                                        <a href="{{ url($itemSlug) }}"
                                           style="text-decoration: none;"
                                           class="inline-block px-3 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-150 font-medium text-sm"
                                        >
                                            ✏️ Listar/Editar
                                        </a>
                                    @else
                                        <a href="{{ url($itemSlug) }}"
                                           style="text-decoration: none;"
                                           class="inline-block px-3 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-150 font-medium text-sm"
                                        >
                                            📋 Ver Historial
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Botón Cerrar Sesión unido abajo, con borde superior --}}
        <form action="{{ route('logout') }}" method="POST" class="border-t border-gray-200">
            @csrf
            <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-b-md shadow-md transition duration-300"
            >
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
