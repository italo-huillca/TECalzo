@extends('layouts.app')

@section('content')
    <x-product-carousel :randomProducts="$randomProducts" />
    <!-- Categorías -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('products.category', 1) }}" class="block bg-blue-100 p-6 rounded-lg shadow-md hover:bg-blue-200">
            <h4 class="text-xl font-bold text-blue-700 text-center">Hombres</h4>
        </a>
        <a href="{{ route('products.category', 2) }}" class="block bg-pink-100 p-6 rounded-lg shadow-md hover:bg-pink-200">
            <h4 class="text-xl font-bold text-pink-700 text-center">Mujeres</h4>
        </a>
        <a href="{{ route('products.category', 3) }}" class="block bg-green-100 p-6 rounded-lg shadow-md hover:bg-green-200">
            <h4 class="text-xl font-bold text-green-700 text-center">Niños</h4>
        </a>
    </div>
    
@endsection
