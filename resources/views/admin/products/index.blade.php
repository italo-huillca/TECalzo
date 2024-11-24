@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Lista de Productos</h1>

    <!-- Tabla de productos -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Descripción</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Precio</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tamaño</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Categoría</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Stock</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $product->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $product->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ Str::limit($product->description, 50) }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">${{ $product->price }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $product->size }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $product->category->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $product->stock }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 flex space-x-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                               class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">Editar</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
