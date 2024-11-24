@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')

<h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Carrito de Compras</h1>

@if(session('cart') && count(session('cart')) > 0)
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Producto</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Precio</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Cantidad</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Total</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-2 flex items-center">
                            <img src="{{ asset('images/products/' . ($details['image'] ?? 'default.png')) }}" 
                                 alt="{{ $details['name'] }}" 
                                 class="w-16 h-16 rounded-lg mr-4">
                            <span>{{ $details['name'] }}</span>
                        </td>
                        <td class="px-4 py-2 text-gray-700">${{ number_format($details['price'], 2) }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 p-1 border rounded text-center">
                                <button type="submit" class="ml-2 bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                                    Actualizar
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-2 text-gray-700">
                            ${{ number_format($details['price'] * $details['quantity'], 2) }}
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-between items-center">
        <p class="text-xl font-semibold text-gray-800">
            Total: ${{ number_format(array_reduce(session('cart'), function($total, $item) { return $total + $item['price'] * $item['quantity']; }, 0), 2) }}
        </p>
        <a href="{{ route('orders.checkoutForm') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
            Continuar con la Orden
        </a>
    </div>
@else
    <p class="text-center text-gray-600 text-lg">El carrito está vacío.</p>
@endif

<div class="mt-6 text-center">
    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
        Volver al catálogo
    </a>
</div>

@endsection
