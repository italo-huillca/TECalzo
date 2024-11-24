@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')

<h1 class="text-2xl font-bold mb-4">Catálogo de Productos</h1>

<!-- Filtros básicos -->
<form method="GET" action="{{ route('products.index') }}" class="mb-6">
    <div class="flex gap-4">
        <select name="category" class="border border-gray-300 rounded px-4 py-2">
            <option value="">Todas las categorías</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <input type="number" name="min_price" placeholder="Precio mínimo" value="{{ request('min_price') }}" class="border border-gray-300 rounded px-4 py-2">
        <input type="number" name="max_price" placeholder="Precio máximo" value="{{ request('max_price') }}" class="border border-gray-300 rounded px-4 py-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Filtrar
        </button>
    </div>
</form>

<!-- Lista de productos -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($products as $product)
        <div class="bg-white shadow-md rounded-lg p-4">
            <!-- Enlace en la imagen del producto -->
            <a href="{{ route('products.show', $product->id) }}">
                @if($product->image)
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" alt="Imagen no disponible" class="w-full h-48 object-cover rounded-lg mb-4">
                @endif
            </a>
            <h2 class="text-lg font-bold">
                <a href="{{ route('products.show', $product->id) }}" class="hover:underline">
                    {{ $product->name }}
                </a>
            </h2>
            <p class="text-gray-700">{{ $product->description }}</p>
            <p class="text-gray-800 font-semibold">Precio: ${{ $product->price }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Añadir al Carrito
                </button>
            </form>
        </div>
    @endforeach
</div>

<!-- Paginación -->
<div class="mt-6">
    {{ $products->links() }}
</div>

@endsection
