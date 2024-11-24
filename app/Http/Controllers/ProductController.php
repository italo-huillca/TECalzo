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

        $products = $query->paginate(9);

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
    public function category($id)
    {
        // Obtén todas las categorías para mostrarlas en la vista (si es necesario)
        $categories = Category::all();
    
        // Encuentra la categoría seleccionada o lanza un error 404 si no existe
        $category = Category::findOrFail($id);
    
        // Obtén los productos de la categoría seleccionada
        $products = Product::where('category_id', $id)->paginate(9);
    
        return view('products.index', compact('products', 'category', 'categories'));
    }
}
