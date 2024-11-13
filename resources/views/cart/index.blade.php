@vite('resources/css/app.css')
<h1>Carrito de Compras</h1>

@if(session('cart'))
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $id => $details)
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }}</td>
                    <td>
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                    <td>{{ $details['price'] * $details['quantity'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <p><strong>Total:</strong> {{ array_reduce(session('cart'), function($total, $item) { return $total + $item['price'] * $item['quantity']; }, 0) }}</p>
    </div>
@else
    <p>El carrito está vacío.</p>
@endif

<a href="{{ route('products.index') }}">Volver al catálogo</a>
