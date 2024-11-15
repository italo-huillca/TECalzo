<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.products.index') }}">Productos</a>
        <a href="{{ route('admin.products.create') }}">Crear Producto</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
