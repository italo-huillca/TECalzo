<h1>Detalle del Pedido #{{ $order->id }}</h1>

<p><strong>Fecha:</strong> {{ $order->order_date }}</p>
<p><strong>Total:</strong> {{ $order->total }}</p>
<p><strong>Estado:</strong> {{ $order->status }}</p>
<p><strong>Dirección de Envío:</strong> {{ $order->shipping_address }}</p>

<h2>Productos</h2>
<ul>
    @foreach ($order->orderDetails as $detail)
        <li>
            {{ $detail->product->name }} - Cantidad: {{ $detail->quantity }} - Precio: {{ $detail->unit_price }}
        </li>
    @endforeach
</ul>

<a href="{{ route('products.index') }}">Volver al catálogo</a>
