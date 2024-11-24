<!-- Contenido principal -->
<main class="container mx-auto p-4">
    <!-- Título del carrusel -->
    <h2 class="text-4xl font-extrabold text-blue-600 text-center mb-8">
        Productos Destacados
    </h2>

    <!-- Verificación de productos destacados -->
    @if($randomProducts->isEmpty())
        <p class="text-center text-gray-600">No hay productos destacados en este momento.</p>
    @else
        <div class="relative overflow-hidden">
            <!-- Contenedor del carrusel -->
            <div class="flex transition-transform ease-in-out duration-500" id="carouselInner">
                @foreach($randomProducts as $key => $product)
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <div class="flex flex-col items-center">
                            <a href="{{ route('products.show', $product->id) }}">
                                <img src="{{ asset('images/products/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="rounded-lg shadow-md max-h-64 object-cover">
                            </a>
                            <h5 class="mt-3 text-lg font-bold">{{ $product->name }}</h5>
                            <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Botones de navegación -->
            <button id="prevBtn" 
                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-gray-700 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-500">
                &lt;
            </button>
            <button id="nextBtn" 
                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-gray-700 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-500">
                &gt;
            </button>
        </div>
    @endif
</main>

<!-- Script del carrusel -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carouselInner = document.getElementById('carouselInner');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentIndex = 0;

        // Obtener las slides y su conteo
        const slides = document.querySelectorAll('#carouselInner > div');
        const slideCount = slides.length;

        const updateCarousel = () => {
            // Ancho del contenedor visible del carrusel
            const container = document.querySelector('.relative.overflow-hidden');
            const containerWidth = container.offsetWidth;

            // Desplazar el carrusel según el índice actual
            carouselInner.style.transform = `translateX(-${currentIndex * containerWidth}px)`;
        };

        // Navegación: botón anterior
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : slideCount - 1;
            updateCarousel();
        });

        // Navegación: botón siguiente
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex < slideCount - 1) ? currentIndex + 1 : 0;
            updateCarousel();
        });

        // Ajustar el carrusel al redimensionar la ventana
        window.addEventListener('resize', updateCarousel);

        // Inicializar el carrusel
        updateCarousel();
    });
</script>