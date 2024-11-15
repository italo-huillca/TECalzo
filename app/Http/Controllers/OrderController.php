<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OrderController extends Controller
{
    // Mostrar los detalles de un pedido específico
    public function show($id)
    {
        // Buscar el pedido por su ID
        $order = Order::findOrFail($id);

        // Devolver la vista con el detalle del pedido
        return view('orders.show', compact('order'));
    }
    public function checkout(Request $request)
    {
        // Obtienes el carrito de la sesión
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        // Iniciamos la transacción
        DB::beginTransaction();

        try {
            // Crear el pedido
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_date' => now(),
                'total' => array_reduce(
                    $cart,
                    function ($total, $item) {
                        return $total + $item['price'] * $item['quantity'];
                    },
                    0,
                ),
                'status' => 'pending',
                'shipping_address' => $request->input('shipping_address'),
            ]);

            foreach ($cart as $productId => $details) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $details['quantity'],
                    'unit_price' => $details['price'],
                ]);
            }

            session()->forget('cart');

            DB::commit();

            return redirect()
                ->route('orders.show', $order->id)
                ->with('success', 'Compra realizada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Hubo un problema al procesar tu compra. Inténtalo de nuevo.');
        }
    }

    public function checkoutForm()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirigir si no está autenticado
        }

        return view('orders.checkoutForm');
    }
}
