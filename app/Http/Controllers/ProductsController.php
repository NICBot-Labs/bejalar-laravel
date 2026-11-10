<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::latest();

        if ($request->has('search')) {
            $keyword = $request->query('search');
            $query->where('nama', 'like', '%' . $keyword . '%');
        }

        return response()->json($query->get());
    }

    public function trashed()
    {
        return response()->json(Product::onlyTrashed()->get());
    }

    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $data = $request->validate([
        //     'name' => 'required|string',
        //     'harga' => 'required|numeric',
        //     'stok' => 'required|integer|min:0',
        // ]);

        // return response()->json([
        //     'message' => 'Produk berhasil diterima',
        //     'data' => $data
        // ], 201);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $products = [
        //     1 => ['id' => 1, 'name' => 'Sepatu', 'harga' => 45000, 'stok' => 10],
        //     2 => ['id' => 2, 'name' => 'Kaos', 'harga' => 10000, 'stok' => 20],
        //     3 => ['id' => 3, 'name' => 'Celana', 'harga' => 150000, 'stok' => 15],
        //     4 => ['id' => 4, 'name' => 'Topi', 'harga' => 25000, 'stok' => 30],
        //     5 => ['id' => 5, 'name' => 'Kaos Kaki', 'harga' => 10000, 'stok' => 50],
        //     6 => ['id' => 6, 'name' => 'Kaos Kaki', 'harga' => 10000, 'stok' => 40],
        // ];

        // if (!isset($products[$id])) {
        //     return response()->json([
        //         'message' => 'Produk tidak ditemukan'
        //     ], 404);
        // }

        // return response()->json([
        //     'data' => $products[$id]
        // ], 200);

        // $product = DB::table('products')->find($id);
        // if (!$product) {
        //     return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        // }
        // return response()->json($product);

        return response()->json(Product::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
