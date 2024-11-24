<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // Añadir el producto al carrito o incrementar la cantidad si ya existe
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                "size" => $product->size,
                "image" => $product->image ?? 'default.png', // Asigna la imagen o un valor por defecto
            ];
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cantidad actualizada en el carrito');
        }

        return redirect()->back()->with('error', 'El producto no se encuentra en el carrito');
    }
}
