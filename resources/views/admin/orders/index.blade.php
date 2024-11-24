@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Órdenes</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left text-gray-700 font-semibold">ID</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700 font-semibold">Usuario</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700 font-semibold">Total</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700 font-semibold">Estado</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700 font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b text-gray-600">{{ $order->id }}</td>
                    <td class="px-4 py-2 border-b text-gray-600">{{ $order->user->name }}</td>
                    <td class="px-4 py-2 border-b text-gray-600">${{ number_format($order->total, 2) }}</td>
                    <td class="px-4 py-2 border-b">
                        <span class="px-2 py-1 rounded text-sm 
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-700 @endif
                            @if($order->status == 'completed') bg-green-100 text-green-700 @endif
                            @if($order->status == 'cancelled') bg-red-100 text-red-700 @endif
                        ">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('admin.orders.show', $order->id) }}" 
                           class="text-blue-600 hover:text-blue-800 underline mr-2">
                            Ver Detalles
                        </a>
                        <a href="{{ route('admin.orders.edit', $order->id) }}" 
                           class="text-indigo-600 hover:text-indigo-800 underline">
                            Actualizar Estado
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
