<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TECalzo')</title>
    @vite('resources/css/app.css') <!-- TailwindCSS -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle,shopping_cart" />
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Barra de navegación -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('favicon.ico') }}" alt="TECalzo Logo" class="w-11 h-11">
                <span class="text-xl font-bold text-blue-500">TECalzo</span>
            </a>
            <!-- Barra de búsqueda -->
            @include('partials.search-bar')

            <!-- Botones de acciones -->
            <div class="flex items-center gap-4 relative">
                <!-- Botón Todos los Productos -->
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-500">
                    Todos los Productos
                </a>

                <!-- Carrito -->
                <a href="{{ route('cart.index') }}" class="relative group">
                    <span class="material-symbols-outlined text-gray-600 text-xl">
                        shopping_cart
                    </span>
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                        {{ session()->get('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>

                <!-- Botón Historial (solo para usuarios autenticados) -->
                @if (auth()->check())
                    <a href="{{ route('orders.history') }}" class="text-gray-600 hover:text-blue-500">
                        Historial
                    </a>
                @endif

                <!-- Perfil/Login -->
                <div class="relative">
                    <!-- Botón de perfil/login -->
                    <button id="profileButton"
                        class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span class="material-symbols-outlined text-gray-600 text-xl">
                            account_circle
                        </span>
                    </button>

                    <!-- Menú desplegable solo para usuarios autenticados -->
                    @if (auth()->check())
                        <div id="profileDropdown"
                            class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Ver Perfil
                            </a>

                            <!-- Botón especial para admin -->
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ url('/admin/products') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Panel de Administración
                                </a>
                            @endif

                            <!-- Botón para cerrar sesión -->
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-gray-700 text-left hover:bg-gray-100">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="absolute inset-0 w-full h-full"></a>
                    @endif

                </div>

            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');

        // Toggle el menú desplegable
        profileButton?.addEventListener('click', () => {
            profileDropdown?.classList.toggle('hidden');
        });

        // Cerrar el menú si se hace clic fuera
        document.addEventListener('click', (event) => {
            if (!profileButton?.contains(event.target) && !profileDropdown?.contains(event.target)) {
                profileDropdown?.classList.add('hidden');
            }
        });
    });
</script>

</html>
