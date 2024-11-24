@extends('layouts.app')

@section('title', 'Historial de Pedidos')

@section('content')
<div class="container mx-auto p-4">
    <!-- Título -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Historial de Pedidos</h1>

    @if($orders->isEmpty())
        <!-- Mensaje si no hay pedidos -->
        <p class="text-center text-gray-600 text-lg">No tienes pedidos realizados.</p>
    @else
        <!-- Lista de pedidos -->
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="border rounded-lg p-6 bg-white shadow-md">
                    <!-- Encabezado del pedido -->
                    <h2 class="text-xl font-bold text-gray-800">Pedido #{{ $order->id }}</h2>
                    <p class="text-sm text-gray-600">Fecha: {{ $order->order_date }}</p>
                    <p class="text-sm text-gray-600">
                        Estado: 
                        <span class="px-3 py-1 rounded-full text-white 
                            {{ $order->status === 'pendiente' ? 'bg-yellow-500' : ($order->status === 'completado' ? 'bg-green-500' : 'bg-red-500') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-600">Total: ${{ number_format($order->total, 2) }}</p>
                    <p class="text-sm text-gray-600">Dirección de envío: {{ $order->shipping_address }}</p>

                    <!-- Productos del pedido -->
                    <h3 class="text-md font-semibold mt-4">Productos:</h3>
                    <ul class="list-disc pl-5 text-sm text-gray-700">
                        @foreach($order->orderDetails as $detail)
                            <li>
                                {{ $detail->product->name }} 
                                ({{ $detail->quantity }} x ${{ number_format($detail->unit_price, 2) }})
                            </li>
                        @endforeach
                    </ul>

                    <!-- Botón para ver detalles -->
                    <div class="mt-4">
                        <a href="{{ route('orders.show', $order->id) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Ver Detalle
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
