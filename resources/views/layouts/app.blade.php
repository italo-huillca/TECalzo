<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite('resources/css/app.css') <!-- Cargar TailwindCSS -->
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Barra de navegación -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-500">Mi Aplicación</a>
            <!-- Barra de búsqueda -->
            @include('partials.search-bar')
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>
