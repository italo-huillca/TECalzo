<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Productos</title>
    @vite('resources/css/app.css') <!-- Si usas Vite para cargar TailwindCSS -->
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Buscar Productos</h1>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('products.search') }}" method="GET" class="mb-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Input de búsqueda -->
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Buscar productos..." 
                    value="{{ old('search', $searchTerm ?? '') }}"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/2"
                />

                <!-- Dropdown para seleccionar el filtro -->
                <select 
                    name="filter" 
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/4">
                    <option value="name" {{ old('filter', $filter ?? '') === 'name' ? 'selected' : '' }}>Nombre</option>
                    <option value="description" {{ old('filter', $filter ?? '') === 'description' ? 'selected' : '' }}>Descripción</option>
                    <option value="price" {{ old('filter', $filter ?? '') === 'price' ? 'selected' : '' }}>Precio</option>
                    <option value="size" {{ old('filter', $filter ?? '') === 'size' ? 'selected' : '' }}>Tamaño</option>
                </select>

                <!-- Botón de búsqueda -->
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Buscar
                </button>
            </div>
        </form>

        <!-- Resultados -->
        @if(isset($products) && count($products) > 0)
            <h2 class="text-xl font-semibold mb-4">
                Resultados de búsqueda 
                @if(!empty($searchTerm))
                    para "{{ $searchTerm }}" en "{{ ucfirst($filter) }}"
                @endif
                :
            </h2>
            <ul class="space-y-2">
                @foreach($products as $product)
                    <li class="border rounded-lg p-4 bg-white">
                        <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p class="text-sm text-gray-600">Precio: ${{ $product->price }}</p>
                        <p class="text-sm text-gray-600">Tamaño: {{ $product->size }}</p>
                        <p class="text-sm text-gray-600">Stock: {{ $product->stock }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">No se encontraron productos que coincidan con la búsqueda.</p>
        @endif
    </div>
</body>
</html>
