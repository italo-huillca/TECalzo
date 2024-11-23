<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    // Filtros básicos (categoría y rango de precio)
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // Obtener las categorías
    $categories = Category::all();

    $products = $query->paginate(10);

    return view('products.index', compact('products', 'categories'));
}

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function home()
    {
        $randomProducts = Product::inRandomOrder()->take(5)->get(); // Obtiene productos aleatorios
        return view('home', compact('randomProducts'));
    }
}
