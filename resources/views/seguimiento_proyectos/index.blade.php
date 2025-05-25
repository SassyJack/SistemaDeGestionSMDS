@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Seguimiento de Proyectos</h2>
        <a href="{{ route('seguimiento_proyectos.create') }}">
            <x-button>
                Nuevo Seguimiento
            </x-button>
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
                    <th class="px-6 py-3 text-left">Proyecto</th>
                    <th class="px-6 py-3 text-left">Interventor</th>
                    <th class="px-6 py-3 text-left">Usuario</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                    <th class="px-6 py-3 text-left">% Avance</th>
                    <th class="px-6 py-3 text-left">Fecha Modificación</th>
                    <th class="px-6 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($seguimientos as $seguimiento)
                    <tr>
                        <td class="px-6 py-4">{{ $seguimiento->proyecto->titulo }}</td>
                        <td class="px-6 py-4">{{ $seguimiento->interventor->persona->nombre }}</td>
                        <td class="px-6 py-4">{{ $seguimiento->usuario->persona->nombre }}</td>
                        <td class="px-6 py-4">{{ Str::limit($seguimiento->descripcion, 50) }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-full bg-gray-200 rounded-full h-4 mr-2 overflow-hidden shadow-inner">
                                    <div class="progress-bar bg-gradient-to-r from-blue-500 to-blue-600 h-4 rounded-full transition-all duration-500 ease-out" 
                                         style="width: {{ $seguimiento->porcentaje_avance }}%"
                                         data-percent="{{ $seguimiento->porcentaje_avance }}"></div>
                                </div>
                                <span class="text-sm font-medium progress-percent">{{ $seguimiento->porcentaje_avance }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $seguimiento->fecha_modificacion }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('seguimiento_proyectos.edit', $seguimiento) }}" class="text-blue-500 hover:underline mr-2">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center">No hay seguimientos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Estilos para la barra de progreso */
    .progress-bar {
        position: relative;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    
    .progress-bar::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            90deg,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.3) 50%,
            rgba(255, 255, 255, 0) 100%
        );
        animation: shimmer 1.5s infinite;
    }
    
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aplicar colores según el porcentaje
        const progressBars = document.querySelectorAll('.progress-bar');
        
        progressBars.forEach(bar => {
            const percent = parseInt(bar.getAttribute('data-percent'));
            
            // Cambiar color según el porcentaje
            if (percent < 25) {
                bar.classList.remove('from-blue-500', 'to-blue-600');
                bar.classList.add('from-red-500', 'to-red-600');
            } else if (percent < 50) {
                bar.classList.remove('from-blue-500', 'to-blue-600');
                bar.classList.add('from-orange-500', 'to-orange-600');
            } else if (percent < 75) {
                bar.classList.remove('from-blue-500', 'to-blue-600');
                bar.classList.add('from-yellow-500', 'to-yellow-600');
            } else {
                bar.classList.remove('from-blue-500', 'to-blue-600');
                bar.classList.add('from-green-500', 'to-green-600');
            }
            
            // Efecto de animación al cargar
            setTimeout(() => {
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = percent + '%';
                }, 100);
            }, 0);
        });
    });
</script>
@endsection