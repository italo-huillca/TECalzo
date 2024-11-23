<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCarousel extends Component
{
    public $randomProducts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($randomProducts)
    {
        $this->randomProducts = $randomProducts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-carousel');
    }
}
