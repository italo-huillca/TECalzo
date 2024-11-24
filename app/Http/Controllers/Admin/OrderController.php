<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->paginate(10); // Paginación de órdenes
        return view('admin.orders.index', compact('orders'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
    
        // Validación de estados
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled'
        ]);
    
        $order->update(['status' => $request->status]);
    
        return redirect()->route('admin.orders.index')->with('success', 'Estado actualizado exitosamente.');
    }
    public function show($id)
    {
        $order = Order::with('orderDetails.product', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
    public function edit($id)
{
    $order = Order::findOrFail($id);
    return view('admin.orders.edit', compact('order'));
}

            
}
