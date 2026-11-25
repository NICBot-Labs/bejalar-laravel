<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = Category::create(['nama' => 'Elektronik']);
    }

    public function test_can_display_products_index_page()
    {
        Product::create([
            'nama' => 'Laptop Asus',
            'harga' => 8500000,
            'stok' => 10,
            'category_id' => $this->category->id,
            'deskripsi' => 'Laptop spek tinggi',
        ]);

        $response = $this->get(route('produk.index'));

        $response->assertStatus(200);
        $response->assertSee('Daftar Produk');
        $response->assertSee('Laptop Asus');
        $response->assertSee('Elektronik');
        $response->assertSee('8.500.000');
    }

    public function test_can_search_products_by_name()
    {
        Product::create([
            'nama' => 'Sepatu Futsal Nike',
            'harga' => 600000,
            'stok' => 5,
            'category_id' => $this->category->id,
        ]);

        Product::create([
            'nama' => 'Keyboard Gaming RGB',
            'harga' => 450000,
            'stok' => 8,
            'category_id' => $this->category->id,
        ]);

        $response = $this->get(route('produk.index', ['search' => 'Futsal']));

        $response->assertStatus(200);
        $response->assertSee('Sepatu Futsal Nike');
        $response->assertDontSee('Keyboard Gaming RGB');
    }

    public function test_can_display_create_product_page()
    {
        $response = $this->get(route('produk.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Produk Baru');
        $response->assertSee('Elektronik');
    }

    public function test_can_store_product_with_valid_data()
    {
        $payload = [
            'nama' => 'Smartphone Galaxy',
            'harga' => 3500000,
            'stok' => 25,
            'category_id' => $this->category->id,
            'deskripsi' => 'Smartphone keren',
        ];

        $response = $this->post(route('produk.store'), $payload);

        $response->assertRedirect(route('produk.index'));
        $response->assertSessionHas('success', 'Produk berhasil ditambahkan.');

        $this->assertDatabaseHas('products', [
            'nama' => 'Smartphone Galaxy',
            'harga' => 3500000,
        ]);
    }

    public function test_cannot_store_product_with_invalid_data()
    {
        $response = $this->post(route('produk.store'), [
            'nama' => '',
            'harga' => 'bukan-angka',
            'stok' => -5,
            'category_id' => 9999,
        ]);

        $response->assertSessionHasErrors(['nama', 'harga', 'stok', 'category_id']);
    }

    public function test_can_display_edit_product_page()
    {
        $product = Product::create([
            'nama' => 'Monitor Gaming',
            'harga' => 2000000,
            'stok' => 5,
            'category_id' => $this->category->id,
        ]);

        $response = $this->get(route('produk.edit', $product));

        $response->assertStatus(200);
        $response->assertSee('Edit Produk: Monitor Gaming');
        $response->assertSee('Monitor Gaming');
        $response->assertSee('2000000');
    }

    public function test_can_update_product()
    {
        $product = Product::create([
            'nama' => 'Headset Lama',
            'harga' => 150000,
            'stok' => 10,
            'category_id' => $this->category->id,
        ]);

        $response = $this->put(route('produk.update', $product), [
            'nama' => 'Headset Baru',
            'harga' => 250000,
            'stok' => 15,
            'category_id' => $this->category->id,
            'deskripsi' => 'Versi terbaru',
        ]);

        $response->assertRedirect(route('produk.index'));
        $response->assertSessionHas('success', 'Produk berhasil diperbarui.');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'nama' => 'Headset Baru',
            'harga' => 250000,
        ]);
    }

    public function test_can_delete_product()
    {
        $product = Product::create([
            'nama' => 'Mouse Rusak',
            'harga' => 50000,
            'stok' => 1,
            'category_id' => $this->category->id,
        ]);

        $response = $this->delete(route('produk.destroy', $product));

        $response->assertRedirect(route('produk.index'));
        $response->assertSessionHas('success', 'Produk berhasil dihapus.');

        $this->assertSoftDeleted('products', [
            'id' => $product->id,
        ]);
    }

    public function test_relationship_models()
    {
        $product = Product::create([
            'nama' => 'Produk Relasi',
            'harga' => 10000,
            'stok' => 10,
            'category_id' => $this->category->id,
        ]);

        // Product belongsTo Category
        $this->assertInstanceOf(Category::class, $product->category);
        $this->assertEquals($this->category->id, $product->category->id);

        // Category hasMany Product
        $this->assertTrue($this->category->products->contains($product));
    }
}
