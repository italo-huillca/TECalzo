<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Panel de Administración</h1>
    <p class="text-gray-700">Bienvenido al panel de administración.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <a href="{{ route('admin.products.index') }}" class="bg-blue-500 text-white p-4 rounded-lg shadow hover:bg-blue-600">
            Gestión de Productos
        </a>
        <!-- Puedes añadir más enlaces a otras funcionalidades -->
    </div>
</div>
@endsection
