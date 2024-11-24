<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración')</title>
    @vite('resources/css/app.css') <!-- TailwindCSS -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle,shopping_cart" />
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Barra de navegación -->
    <nav class="bg-blue-500 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-bold hover:underline">
                TECalzo - Admin Panel
            </a>
            <div class="flex space-x-4">
                <a href="{{ route('admin.products.index') }}" 
                   class="hover:underline">Productos</a>
                <a href="{{ route('admin.products.create') }}" 
                   class="hover:underline">Crear Producto</a>
                <a href="{{ route('admin.orders.index') }}" 
                   class="hover:underline">Órdenes</a>
                <a href="{{ route('home') }}" 
                   class="hover:underline">Volver a la Tienda</a>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

</body>
</html>
