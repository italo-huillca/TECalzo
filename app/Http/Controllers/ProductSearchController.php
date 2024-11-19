<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductSearchController extends Controller
{
    
    public function index(Request $request)
    {
        // Obtiene el término de búsqueda y el filtro desde el formulario
        $searchTerm = $request->input('search');
        $filter = $request->input('filter', 'name'); // Por defecto, busca por nombre
    
        // Realiza la búsqueda en el filtro seleccionado
        $products = Product::where($filter, 'LIKE', '%' . $searchTerm . '%')->get();
    
        // Devuelve la vista con los resultados y el filtro seleccionado
        return view('products.search', compact('products', 'searchTerm', 'filter'));
    }
    
}
