<!-- resources/views/products/index.blade.php -->
<h1>Catálogo de Productos</h1>

<!-- Filtros básicos -->
<form method="GET" action="{{ route('products.index') }}">
    <select name="category">
        <option value="">Todas las categorías</option>
        <!-- Opciones de categoría aquí -->
    </select>
    <input type="number" name="min_price" placeholder="Precio mínimo">
    <input type="number" name="max_price" placeholder="Precio máximo">
    <button type="submit">Filtrar</button>
</form>

<!-- Lista de productos -->
<div class="products">
    @foreach($products as $product)
        <div class="product">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Precio: {{ $product->price }}</p>
            <a href="{{ route('products.show', $product->id) }}">Ver detalles</a>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">Añadir al carrito</button>
            </form>
        </div>
    @endforeach
</div>

{{ $products->links() }}
