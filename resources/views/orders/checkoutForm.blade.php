<!-- resources/views/orders/checkoutForm.blade.php -->

@extends('layouts.app')

@section('title', 'Confirmar Compra')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Confirmar Compra</h1>

    <form action="{{ route('orders.checkout') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        <!-- Dirección de Envío -->
        <div class="mb-4">
            <label for="shipping_address" class="block text-gray-700 font-medium mb-2">Dirección de Envío:</label>
            <textarea 
                name="shipping_address" 
                id="shipping_address" 
                rows="4" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Ingresa tu dirección completa" 
                required></textarea>
        </div>

        <!-- Botón de Confirmar -->
        <div class="text-center">
            <button type="submit" 
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Confirmar Compra
            </button>
        </div>
    </form>
</div>
@endsection
