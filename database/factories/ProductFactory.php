<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produk = [
            [
                'nama' => 'Beras Premium 5 Kg',
                'deskripsi' => 'Beras premium berkualitas tinggi dengan tekstur pulen.',
                'harga' => 75000,
            ],
            [
                'nama' => 'Minyak Goreng 2 Liter',
                'deskripsi' => 'Minyak goreng berkualitas untuk kebutuhan memasak.',
                'harga' => 35000,
            ],
            [
                'nama' => 'Kopi Hitam 200 Gram',
                'deskripsi' => 'Kopi hitam dengan aroma khas dan cita rasa nikmat.',
                'harga' => 25000,
            ],
            [
                'nama' => 'Gula Pasir 1 Kg',
                'deskripsi' => 'Gula pasir putih untuk minuman dan kebutuhan memasak.',
                'harga' => 18000,
            ],
            [
                'nama' => 'Susu UHT 1 Liter',
                'deskripsi' => 'Susu UHT siap minum dengan kandungan nutrisi.',
                'harga' => 22000,
            ],
            [
                'nama' => 'Baju Kemeja Pria',
                'deskripsi' => 'Kemeja pria dengan bahan nyaman dan desain modern.',
                'harga' => 95000,
            ],
            [
                'nama' => 'Sepatu Olahraga',
                'deskripsi' => 'Sepatu olahraga yang nyaman untuk aktivitas sehari-hari.',
                'harga' => 175000,
            ],
            [
                'nama' => 'Tas Ransel',
                'deskripsi' => 'Tas ransel dengan ruang penyimpanan luas.',
                'harga' => 120000,
            ],
            [
                'nama' => 'Mouse Wireless',
                'deskripsi' => 'Mouse nirkabel dengan desain ergonomis.',
                'harga' => 85000,
            ],
            [
                'nama' => 'Keyboard Mechanical',
                'deskripsi' => 'Keyboard mekanis dengan respons tombol yang nyaman.',
                'harga' => 250000,
            ],
            [
                'nama' => 'Headset Bluetooth',
                'deskripsi' => 'Headset nirkabel dengan kualitas suara jernih.',
                'harga' => 150000,
            ],
            [
                'nama' => 'Flashdisk 32 GB',
                'deskripsi' => 'Media penyimpanan portabel untuk menyimpan dokumen.',
                'harga' => 65000,
            ],
            [
                'nama' => 'Power Bank 10000 mAh',
                'deskripsi' => 'Pengisi daya portabel untuk perangkat elektronik.',
                'harga' => 135000,
            ],
            [
                'nama' => 'Lampu LED 12 Watt',
                'deskripsi' => 'Lampu LED hemat energi dengan cahaya terang.',
                'harga' => 25000,
            ],
            [
                'nama' => 'Buku Tulis 58 Lembar',
                'deskripsi' => 'Buku tulis untuk mencatat kegiatan belajar dan pekerjaan.',
                'harga' => 5000,
            ],
            [
                'nama' => 'Pulpen Hitam',
                'deskripsi' => 'Pulpen dengan tinta hitam yang lancar digunakan.',
                'harga' => 3000,
            ],
            [
                'nama' => 'Sabun Mandi 450 ml',
                'deskripsi' => 'Sabun mandi cair untuk membersihkan dan merawat kulit.',
                'harga' => 28000,
            ],
            [
                'nama' => 'Sampo 340 ml',
                'deskripsi' => 'Sampo untuk membersihkan rambut dan kulit kepala.',
                'harga' => 32000,
            ],
            [
                'nama' => 'Pasta Gigi 190 Gram',
                'deskripsi' => 'Pasta gigi untuk membantu menjaga kebersihan gigi.',
                'harga' => 18000,
            ],
            [
                'nama' => 'Botol Minum 1 Liter',
                'deskripsi' => 'Botol minum praktis untuk kebutuhan sehari-hari.',
                'harga' => 45000,
            ],
        ];

        $item = fake()->unique()->randomElement($produk);

        return [
            'nama' => $item['nama'],
            'deskripsi' => $item['deskripsi'],
            'harga' => $item['harga'],
            'stok' => fake()->numberBetween(0, 100),
        ];
    }
}
