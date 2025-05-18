@extends('app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Panel de Control</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Tarjetas de resumen -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-2">Usuarios</h3>
                <p class="text-3xl font-bold">{{ \App\Models\Usuario::count() }}</p>
            </div>
            
            <!-- Puedes agregar más tarjetas según necesites -->
        </div>
    </div>
</div>
@endsection