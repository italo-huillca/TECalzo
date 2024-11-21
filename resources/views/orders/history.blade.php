@extends('layouts.app')

@section('title', 'Historial de Pedidos')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Historial de Pedidos</h1>

    @if($orders->isEmpty())
        <p class="text-gray-600">No tienes pedidos realizados.</p>
    @else
        <ul class="space-y-6">
            @foreach($orders as $order)
                <li class="border rounded-lg p-4 bg-white">
                    <h2 class="text-lg font-bold mb-2">Pedido #{{ $order->id }}</h2>
                    <p class="text-sm text-gray-600">Fecha: {{ $order->order_date }}</p>
                    <p class="text-sm text-gray-600">Estado: {{ ucfirst($order->status) }}</p>
                    <p class="text-sm text-gray-600">Total: ${{ number_format($order->total, 2) }}</p>
                    <p class="text-sm text-gray-600">Dirección de envío: {{ $order->shipping_address }}</p>

                    <!-- Detalles del pedido -->
                    <h3 class="text-md font-semibold mt-4">Productos:</h3>
                    <ul class="list-disc pl-5">
                        @foreach($order->orderDetails as $detail)
                            <li>
                                {{ $detail->product->name }} ({{ $detail->quantity }} x ${{ number_format($detail->unit_price, 2) }})
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
