@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Actualizar Estado de la Orden</h1>
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
            @csrf
            @method('PUT')

            <!-- Información de la orden -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Información de la Orden</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <p><span class="font-medium">ID:</span> {{ $order->id }}</p>
                    <p><span class="font-medium">Usuario:</span> {{ $order->user->name }}</p>
                    <p><span class="font-medium">Total:</span> ${{ number_format($order->total, 2) }}</p>
                    <p><span class="font-medium">Estado Actual:</span> {{ ucfirst($order->status) }}</p>
                </div>
            </div>

            <!-- Campo de selección para estado -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Actualizar Estado</label>
                <select name="status" id="status" required 
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completada</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('admin.orders.index') }}" 
                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                    ← Volver a Órdenes
                </a>
                <button type="submit" 
                    class="bg-indigo-600 text-white font-medium px-6 py-2 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
