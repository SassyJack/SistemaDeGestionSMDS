@extends('app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Panel de Control</h2>
            <p class="mt-1 text-sm text-gray-500">Resumen general del sistema</p>
        </div>
        
        <!-- Tarjetas de Estadísticas -->
        <div class="flex flex-wrap gap-3 mb-6">
            <!-- Tarjeta de Usuarios -->
            <div class="flex-1 min-w-[150px] bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-blue-100 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Usuarios</p>
                        <p class="text-lg font-semibold text-gray-800"><span class="stat-number" data-count="{{ \App\Models\Usuario::count() }}">0</span></p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Proyectos -->
            <div class="flex-1 min-w-[150px] bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-emerald-100 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Proyectos</p>
                        <p class="text-lg font-semibold text-gray-800"><span class="stat-number" data-count="{{ \App\Models\Proyecto::count() }}">0</span></p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Contratos -->
            <div class="flex-1 min-w-[150px] bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-violet-100 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Contratos</p>
                        <p class="text-lg font-semibold text-gray-800"><span class="stat-number" data-count="{{ \App\Models\Contrato::count() }}">0</span></p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Metas -->
            <div class="flex-1 min-w-[150px] bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-amber-100 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Metas</p>
                        <p class="text-lg font-semibold text-gray-800"><span class="stat-number" data-count="{{ \App\Models\Meta::count() }}">0</span></p>
                    </div>
                </div>
            </div>
        </div>

        @php
            use Carbon\Carbon;
            $labels = [];
            $data = [];
            for ($i = 5; $i >= 0; $i--) {
                $m = Carbon::now()->subMonths($i);
                $labels[] = $m->format('M Y');
                $data[] = \App\Models\Proyecto::whereYear('fecha_inicio', $m->year)->whereMonth('fecha_inicio', $m->month)->count();
            }
        @endphp

        <!-- Gráfico de Proyectos (últimos 6 meses) -->
        <div class="mb-6">
            <div class="chart-card">
                <h3 class="text-base font-semibold text-gray-800 mb-3">Proyectos - Últimos 6 meses</h3>
                <canvas id="projectsChart" height="80"></canvas>
            </div>
        </div>

        <!-- Sección de Contenido Principal -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Últimos Proyectos -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-5">
                    <h3 class="text-base font-semibold text-gray-800 mb-4">Últimos Proyectos</h3>
                    <div class="space-y-3">
                        @foreach(\App\Models\Proyecto::orderBy('fecha_inicio', 'desc')->take(5)->get() as $proyecto)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <div class="min-w-0 flex-1 pr-4">
                                <p class="text-sm font-medium text-gray-800 truncate">{{ $proyecto->titulo }}</p>
                                <div class="flex items-center mt-1">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $proyecto->estado->nombre === 'Activo' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-700' }}">
                                        {{ $proyecto->estado->nombre }}
                                    </span>
                                    <span class="text-xs text-gray-500 ml-2">{{ $proyecto->fecha_inicio }}</span>
                                </div>
                            </div>
                            <a href="{{ route('proyectos.edit', $proyecto) }}" class="flex items-center px-2.5 py-1.5 text-xs font-medium text-emerald-700 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors duration-200">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Editar
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Últimos Contratos -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-5">
                    <h3 class="text-base font-semibold text-gray-800 mb-4">Últimos Contratos</h3>
                    <div class="space-y-3">
                        @foreach(\App\Models\Contrato::orderBy('fecha_celebracion', 'desc')->take(5)->get() as $contrato)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <div class="min-w-0 flex-1 pr-4">
                                <p class="text-sm font-medium text-gray-800 truncate">{{ $contrato->numero_contrato }}</p>
                                <div class="flex items-center mt-1">
                                    <p class="text-xs text-gray-500">{{ $contrato->contratista->persona->nombre ?? 'N/A' }}</p>
                                    <span class="text-xs text-gray-400 mx-2">•</span>
                                    <p class="text-xs font-medium text-gray-700">${{ number_format($contrato->valor_contrato, 2) }}</p>
                                </div>
                            </div>
                            <a href="{{ route('contratos.edit', $contrato) }}" class="flex items-center px-2.5 py-1.5 text-xs font-medium text-violet-700 bg-violet-50 rounded-lg hover:bg-violet-100 transition-colors duration-200">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Editar
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Animate counters
        document.addEventListener('DOMContentLoaded', function(){
            document.querySelectorAll('.stat-number').forEach(function(el){
                const target = parseInt(el.getAttribute('data-count') || '0', 10);
                let current = 0;
                const step = Math.max(1, Math.floor(target / 60));
                const intv = setInterval(function(){
                    current += step;
                    if(current >= target){
                        el.textContent = target.toString();
                        clearInterval(intv);
                    } else {
                        el.textContent = current.toString();
                    }
                }, 12);
            });

            // Chart.js projects trend
            const ctx = document.getElementById('projectsChart');
            if(ctx){
                const labels = {!! json_encode($labels) !!};
                const data = {!! json_encode($data) !!};
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Proyectos',
                            data: data,
                            borderColor: '#1766f2',
                            backgroundColor: 'rgba(23,102,242,0.12)',
                            tension: 0.35,
                            fill: true,
                            pointRadius: 3
                        }]
                    },
                    options: {
                        plugins: {legend:{display:false}},
                        scales: {y:{beginAtZero:true,precision:0}}
                    }
                });
            }
        });
    </script>
@endpush