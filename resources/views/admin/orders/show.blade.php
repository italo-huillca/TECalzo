@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Detalles de la Orden</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>ID:</strong> {{ $order->id }}</p>
        <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Dirección de Envío:</strong> {{ $order->shipping_address }}</p>
        <h2 class="text-lg font-semibold mt-4">Productos</h2>
        <ul class="list-disc list-inside">
            @foreach($order->orderDetails as $detail)
                <li>
                    {{ $detail->product->name }} - Cantidad: {{ $detail->quantity }} - ${{ number_format($detail->unit_price, 2) }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
