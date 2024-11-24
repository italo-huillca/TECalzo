<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TECalzo')</title>
    @vite('resources/css/app.css') <!-- TailwindCSS -->

</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Barra de navegación -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-500">TECalzo</a>

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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-blue-500"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-4-8M7 13l4 8m6-8l4 8M7 13h10" />
                    </svg>
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
                <!-- Verificar si el usuario está autenticado -->
                @if (auth()->check())
                    <!-- Desplegable de Perfil -->
                    <div class="relative">
                        <!-- Botón de perfil circular -->
                        <button id="profileButton"
                            class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A9 9 0 1116.88 6.196m-2.12 2.121a3 3 0 11-4.243 4.243m5.657 2.828a6 6 0 10-8.486 0" />
                            </svg>
                        </button>

                        <!-- Menú desplegable -->
                        <div id="profileDropdown"
                            class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Ver Perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Mostrar SVG de login -->
                    <a href="{{ route('login') }}"
                        class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <img src="{{ asset('https://www.svgrepo.com/show/509153/login.svg') }}" alt="Login"
                            class="h-6 w-6">
                    </a>
                @endif
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
        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Cerrar el menú si se hace clic fuera
        document.addEventListener('click', (event) => {
            if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    });
</script>

</html>
