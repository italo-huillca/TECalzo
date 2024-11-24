<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <!-- Imagen del producto -->
        @if($product->image)
        <div class="mb-6 flex justify-center">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-64 h-64 object-cover rounded-lg shadow-sm">
        </div>
        @else
        <div class="mb-6 flex justify-center">
            <img src="{{ asset('images/default-product.png') }}" alt="Producto por defecto" class="w-64 h-64 object-cover rounded-lg shadow-sm">
        </div>
        @endif

        <!-- Información del producto -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h1>
            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
            <p class="text-lg font-semibold text-gray-800 mt-4">Precio: <span class="text-green-500">${{ $product->price }}</span></p>
        </div>

        <!-- Botón para añadir al carrito -->
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                Añadir al carrito
            </button>
        </form>

        <!-- Enlace para volver al catálogo -->
        <div class="mt-6 text-center">
            <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
                &larr; Volver al catálogo
            </a>
        </div>
    </div>
</div>
@endsection
