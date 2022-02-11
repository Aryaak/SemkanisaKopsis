<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Badge Kelas',
            'category_id' => 2,
            'price' => 2500,
            'stock' => 1000,
            'photo' => 'test.jpg',
            'description' => 'ini deskripsi'
        ]);
    }
}
