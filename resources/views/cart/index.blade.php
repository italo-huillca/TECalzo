<!-- resources/views/cart/index.blade.php -->
<h1>Carrito de Compras</h1>

@if(session('cart'))
    <ul>
        @foreach(session('cart') as $id => $details)
            <li>
                <h2>{{ $details['name'] }}</h2>
                <p>Precio: {{ $details['price'] }}</p>
                <p>Cantidad: {{ $details['quantity'] }}</p>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>El carrito está vacío.</p>
@endif

<a href="{{ route('products.index') }}">Volver al catálogo</a>
