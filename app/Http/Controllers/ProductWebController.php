<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    /**
     * Daftar produk dengan pencarian, filter kategori, pagination, dan eager loading.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::with('category');

        // Fitur pencarian berdasarkan nama atau deskripsi produk
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kategori jika dipilih
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Eager loading relasi category, pagination 10 per halaman, bawa parameter query string
        $products = $query->latest()->paginate(10)->withQueryString();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Form tambah produk baru.
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Simpan produk baru ke database.
     * Validasi memakai Form Request (ProductRequest).
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Form edit produk.
     */
    public function edit(Product $produk)
    {
        $categories = Category::all();

        return view('products.edit', compact('produk', 'categories'));
    }

    /**
     * Update produk di database.
     */
    public function update(ProductRequest $request, Product $produk)
    {
        $produk->update($request->validated());

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk (soft delete).
     */
    public function destroy(Product $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
