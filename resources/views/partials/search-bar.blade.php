<form action="{{ route('products.search') }}" method="GET" class="flex gap-4">
    <!-- Campo de búsqueda -->
    <input 
        type="text" 
        name="search" 
        placeholder="Buscar productos..." 
        value="{{ request('search') }}" 
        class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-auto"
    />
    <!-- Dropdown -->
    <select 
        name="filter" 
        class="border border-gray-300 rounded-lg px-4 py-2">
        <option value="name" {{ request('filter') === 'name' ? 'selected' : '' }}>Nombre</option>
        <option value="description" {{ request('filter') === 'description' ? 'selected' : '' }}>Descripción</option>
        <option value="price" {{ request('filter') === 'price' ? 'selected' : '' }}>Precio</option>
        <option value="size" {{ request('filter') === 'size' ? 'selected' : '' }}>Tamaño</option>
    </select>
    <!-- Botón -->
    <button 
        type="submit" 
        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        Buscar
    </button>
</form>
