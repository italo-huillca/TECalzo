@extends('layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')
<div class="container mx-auto p-4">
    <!-- Título -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Detalle del Pedido #{{ $order->id }}</h1>

    <!-- Información general del pedido -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <p class="text-lg"><strong>Fecha:</strong> <span class="text-gray-700">{{ $order->order_date }}</span></p>
        <p class="text-lg"><strong>Total:</strong> <span class="text-gray-700">${{ number_format($order->total, 2) }}</span></p>
        <p class="text-lg"><strong>Estado:</strong> 
            <span class="px-3 py-1 rounded-full text-white 
                {{ $order->status === 'pendiente' ? 'bg-yellow-500' : ($order->status === 'completado' ? 'bg-green-500' : 'bg-red-500') }}">
                {{ ucfirst($order->status) }}
            </span>
        </p>
        <p class="text-lg"><strong>Dirección de Envío:</strong> <span class="text-gray-700">{{ $order->shipping_address }}</span></p>
    </div>

    <!-- Productos del pedido -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Productos</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Imagen</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Producto</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Cantidad</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Precio Unitario</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $detail)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <img src="{{ asset('images/products/' . ($detail->product->image ?? 'default.png')) }}" 
                                 alt="{{ $detail->product->name }}" 
                                 class="w-16 h-16 rounded-lg">
                        </td>
                        <td class="px-4 py-2">{{ $detail->product->name }}</td>
                        <td class="px-4 py-2">{{ $detail->quantity }}</td>
                        <td class="px-4 py-2">${{ number_format($detail->unit_price, 2) }}</td>
                        <td class="px-4 py-2">${{ number_format($detail->quantity * $detail->unit_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Botón para volver al catálogo -->
    <div class="mt-6 text-center">
        <a href="{{ route('products.index') }}" 
           class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Volver al catálogo
        </a>
    </div>
</div>
@endsection
