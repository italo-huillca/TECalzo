@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Crear Producto</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg space-y-6">
        @csrf

        <!-- Campo Nombre -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Campo Descripción -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <!-- Campo Precio -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" step="0.01" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Campo Talla de Calzado -->
        <div>
            <label for="size" class="block text-sm font-medium text-gray-700">Tamaño (Talla Calzado)</label>
            <input type="text" name="size" id="size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Ej. 39, 40, 41" required>
        </div>

        <!-- Campo Categoría -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo Stock -->
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" name="stock" id="stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Campo Imagen -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Botón Crear Producto -->
        <div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                Crear Producto
            </button>
        </div>
    </form>
</div>
@endsection
