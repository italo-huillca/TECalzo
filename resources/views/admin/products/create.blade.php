@extends('layouts.admin')

@section('content')
    <h1>Crear Producto</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Campo Descripción -->
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <!-- Campo Precio -->
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>

        <!-- Campo Talla de Calzado -->
        <div class="form-group">
            <label for="size">Tamaño (Talla Calzado)</label>
            <input type="text" name="size" id="size" class="form-control" placeholder="Ej. 39, 40, 41" required>
        </div>

        <!-- Campo Categoría -->
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <!-- Asume que hay una lista de categorías disponibles -->
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo Stock -->
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>

        <!-- Campo Imagen -->
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Crear Producto</button>
    </form>
@endsection
