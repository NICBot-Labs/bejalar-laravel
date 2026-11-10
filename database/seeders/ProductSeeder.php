<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory()->count(20)->create();

        // Ambil ID kategori berdasarkan nama
        $makanan    = Category::where('nama', 'Makanan')->first()->id;
        $minuman    = Category::where('nama', 'Minuman')->first()->id;
        $cemilan    = Category::where('nama', 'Cemilan')->first()->id;
        $pakaian    = Category::where('nama', 'Pakaian')->first()->id;
        $elektronik = Category::where('nama', 'Elektronik')->first()->id;

        $products = [
            // Makanan
            [
                'nama' => 'Beras Premium 5 Kg',
                'deskripsi' => 'Beras premium berkualitas tinggi dengan tekstur pulen.',
                'harga' => 75000,
                'stok' => 39,
                'category_id' => $makanan,
            ],
            [
                'nama' => 'Minyak Goreng 2 Liter',
                'deskripsi' => 'Minyak goreng berkualitas untuk kebutuhan memasak.',
                'harga' => 35000,
                'stok' => 29,
                'category_id' => $makanan,
            ],
            [
                'nama' => 'Gula Pasir 1 Kg',
                'deskripsi' => 'Gula pasir putih untuk minuman dan kebutuhan memasak.',
                'harga' => 18000,
                'stok' => 32,
                'category_id' => $makanan,
            ],

            // Minuman
            [
                'nama' => 'Kopi Hitam 200 Gram',
                'deskripsi' => 'Kopi hitam dengan aroma khas dan cita rasa nikmat.',
                'harga' => 25000,
                'stok' => 51,
                'category_id' => $minuman,
            ],
            [
                'nama' => 'Susu UHT 1 Liter',
                'deskripsi' => 'Susu UHT siap minum dengan kandungan nutrisi.',
                'harga' => 22000,
                'stok' => 52,
                'category_id' => $minuman,
            ],

            // Cemilan
            [
                'nama' => 'Botol Minum 1 Liter',
                'deskripsi' => 'Botol minum praktis untuk kebutuhan sehari-hari.',
                'harga' => 45000,
                'stok' => 84,
                'category_id' => $cemilan,
            ],

            // Pakaian
            [
                'nama' => 'Baju Kemeja Pria',
                'deskripsi' => 'Kemeja pria dengan bahan nyaman dan desain modern.',
                'harga' => 95000,
                'stok' => 49,
                'category_id' => $pakaian,
            ],
            [
                'nama' => 'Sepatu Olahraga',
                'deskripsi' => 'Sepatu olahraga yang nyaman untuk aktivitas sehari-hari.',
                'harga' => 175000,
                'stok' => 22,
                'category_id' => $pakaian,
            ],
            [
                'nama' => 'Tas Ransel',
                'deskripsi' => 'Tas ransel dengan ruang penyimpanan luas.',
                'harga' => 120000,
                'stok' => 76,
                'category_id' => $pakaian,
            ],

            // Elektronik
            [
                'nama' => 'Mouse Wireless',
                'deskripsi' => 'Mouse nirkabel dengan desain ergonomis.',
                'harga' => 85000,
                'stok' => 75,
                'category_id' => $elektronik,
            ],
            [
                'nama' => 'Keyboard Mechanical',
                'deskripsi' => 'Keyboard mekanis dengan respons tombol yang nyaman.',
                'harga' => 250000,
                'stok' => 49,
                'category_id' => $elektronik,
            ],
            [
                'nama' => 'Headset Bluetooth',
                'deskripsi' => 'Headset nirkabel dengan kualitas suara jernih.',
                'harga' => 150000,
                'stok' => 74,
                'category_id' => $elektronik,
            ],
            [
                'nama' => 'Flashdisk 32 GB',
                'deskripsi' => 'Media penyimpanan portabel untuk menyimpan dokumen.',
                'harga' => 65000,
                'stok' => 37,
                'category_id' => $elektronik,
            ],
            [
                'nama' => 'Power Bank 10000 mAh',
                'deskripsi' => 'Pengisi daya portabel untuk perangkat elektronik.',
                'harga' => 135000,
                'stok' => 44,
                'category_id' => $elektronik,
            ],
            [
                'nama' => 'Lampu LED 12 Watt',
                'deskripsi' => 'Lampu LED hemat energi dengan cahaya terang.',
                'harga' => 25000,
                'stok' => 55,
                'category_id' => $elektronik,
            ],

            // Cemilan (tambahan)
            [
                'nama' => 'Buku Tulis 58 Lembar',
                'deskripsi' => 'Buku tulis untuk mencatat kegiatan belajar dan pekerjaan.',
                'harga' => 5000,
                'stok' => 82,
                'category_id' => $cemilan,
            ],
            [
                'nama' => 'Pulpen Hitam',
                'deskripsi' => 'Pulpen dengan tinta hitam yang lancar digunakan.',
                'harga' => 3000,
                'stok' => 30,
                'category_id' => $cemilan,
            ],

            // Makanan (tambahan)
            [
                'nama' => 'Sabun Mandi 450 ml',
                'deskripsi' => 'Sabun mandi cair untuk membersihkan dan merawat kulit.',
                'harga' => 28000,
                'stok' => 71,
                'category_id' => $makanan,
            ],
            [
                'nama' => 'Sampo 340 ml',
                'deskripsi' => 'Sampo untuk membersihkan rambut dan kulit kepala.',
                'harga' => 32000,
                'stok' => 15,
                'category_id' => $makanan,
            ],
            [
                'nama' => 'Pasta Gigi 190 Gram',
                'deskripsi' => 'Pasta gigi untuk membantu menjaga kebersihan gigi.',
                'harga' => 18000,
                'stok' => 68,
                'category_id' => $makanan,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
