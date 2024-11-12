<!-- resources/views/products/show.blade.php -->
<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Precio: {{ $product->price }}</p>
<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit">Añadir al carrito</button>
</form>
<a href="{{ route('products.index') }}">Volver al catálogo</a>
