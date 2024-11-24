<!-- resources/views/orders/checkout.blade.php -->
<form action="{{ route('orders.checkout') }}" method="POST">
    @csrf
    <label for="shipping_address">Dirección de Envío:</label>
    <textarea name="shipping_address" required></textarea>

    <button type="submit">Confirmar Compra</button>
</form>
