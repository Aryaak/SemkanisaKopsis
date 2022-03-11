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
            'name' => 'Badge Kelas RPL',
            'category_id' => 2,
            'price' => 2500,
            'stock' => 1000,
            'photo' => 'products/gambar-badge-rpl.jpeg',
            'description' => 'tersedia badge untuk kelas X, XI, dan XII'
        ]);
        Product::create([
            'name' => 'Badge OSIS',
            'category_id' => 2,
            'price' => 2500,
            'stock' => 1000,
            'photo' => 'products/gambar-badge-osis.jpeg',
            'description' => 'badge osis untuk siswa'
        ]);
        Product::create([
            'name' => 'Kopikap',
            'category_id' => 4,
            'price' => 1000,
            'stock' => 100,
            'photo' => 'products/gambar-kopikap.jpg',
            'description' => 'minuman kopi dalam gelas yang murah meriah'
        ]);
        Product::create([
            'name' => 'Pensil 2B',
            'category_id' => 1,
            'price' => 2000,
            'stock' => 100,
            'photo' => 'products/gambar-pensil-2b.jpg',
            'description' => 'pensil 2b untuk komputer'
        ]);
    }
}
