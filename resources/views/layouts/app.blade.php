<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite('resources/css/app.css') <!-- TailwindCSS -->
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Barra de navegación -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-500">Mi Aplicación</a>
            
            <!-- Barra de búsqueda -->
            @include('partials.search-bar')

            <!-- Botones de acciones -->
            <div class="flex items-center gap-4">
                <!-- Carrito -->
                <a href="{{ route('cart.index') }}" class="relative group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-4-8M7 13l4 8m6-8l4 8M7 13h10" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                        {{ session()->get('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>

                <!-- Historial -->
                <a href="{{ route('orders.history') }}" class="text-gray-600 hover:text-blue-500">
                    Historial
                </a>

                <!-- Perfil -->
                <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-blue-500">
                    Perfil
                </a>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>
