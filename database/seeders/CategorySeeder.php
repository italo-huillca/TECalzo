<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::updateOrCreate(['name' => 'Hombre'], ['description' => 'Ropa y accesorios para hombre']);
        Category::updateOrCreate(['name' => 'Mujer'], ['description' => 'Ropa y accesorios para mujer']);
        Category::updateOrCreate(['name' => 'Niño'], ['description' => 'Ropa y accesorios para niños']);
    }
}
