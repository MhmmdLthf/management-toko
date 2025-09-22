<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\retails;
use App\Models\wholesales;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Produk 1: Minyak Kita
        $product1 = Product::create([
            'nama_barang' => 'Minyak Kita',
            'stok' => 100, // stok dalam satuan grosir
        ]);

        retails::create([
            'product_id' => $product1->id,
            'satuan' => 'liter',
            'harga_ecer' => 17000,
        ]);

        wholesales::create([
            'product_id' => $product1->id,
            'satuan' => 'dus',
            'stok' => 10,
            'harga_grosir' => 250000,
        ]);

        // Produk 2: Beras Premium
        $product2 = Product::create([
            'nama_barang' => 'Beras Premium',
            'stok' => 50,
        ]);

        retails::create([
            'product_id' => $product2->id,
            'satuan' => 'kg',
            'harga_ecer' => 15000,
        ]);

        wholesales::create([
            'product_id' => $product2->id,
            'satuan' => 'karung 25kg',
            'stok' => 2,
            'harga_grosir' => 350000,
        ]);

        // Produk 3: Gula Pasir
        $product3 = Product::create([
            'nama_barang' => 'Gula Pasir',
            'stok' => 80,
        ]);

        retails::create([
            'product_id' => $product3->id,
            'satuan' => 'kg',
            'harga_ecer' => 14000,
        ]);

        wholesales::create([
            'product_id' => $product3->id,
            'satuan' => 'sak 50kg',
            'stok' => 1,
            'harga_grosir' => 600000,
        ]);
    }
}
