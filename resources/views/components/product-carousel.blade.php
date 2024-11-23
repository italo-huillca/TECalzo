<div class="container mt-4">
    <h2 class="text-center mb-4">Productos Destacados</h2>
    @if($randomProducts->isEmpty())
        <p class="text-center">No hay productos destacados en este momento.</p>
    @else
        <div class="relative">
            <div class="overflow-hidden relative">
                <div class="flex transition-transform ease-in-out duration-500" id="carouselInner">
                    @foreach($randomProducts as $key => $product)
                    <div class="min-w-full">
                        <div class="flex flex-col items-center">
                            <a href="{{ route('products.show', $product->id) }}">
                                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg shadow-md">
                            </a>
                            <h5 class="mt-3 text-lg font-bold">{{ $product->name }}</h5>
                            <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Botones de navegación -->
            <button id="prevBtn" class="absolute top-1/2 left-2 -translate-y-1/2 bg-gray-700 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-500">
                &lt;
            </button>
            <button id="nextBtn" class="absolute top-1/2 right-2 -translate-y-1/2 bg-gray-700 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-500">
                &gt;
            </button>
        </div>
    @endif
</div>

<script>
    const carouselInner = document.getElementById('carouselInner');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentIndex = 0;

    const slideCount = {{ count($randomProducts) }};
    const slideWidth = carouselInner.offsetWidth;

    const updateCarousel = () => {
        carouselInner.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    };

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : slideCount - 1;
        updateCarousel();
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex < slideCount - 1) ? currentIndex + 1 : 0;
        updateCarousel();
    });

    window.addEventListener('resize', () => {
        updateCarousel(); // Adjust carousel on resize
    });
</script>
