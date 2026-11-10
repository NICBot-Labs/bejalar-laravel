<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dataProduct()
    {
        return [
            ['id' => 1, 'name' => 'Sepatu', 'harga' => 45000],
            ['id' => 2, 'name' => 'Kaos', 'harga' => 10000],
            ['id' => 3, 'name' => 'Celana', 'harga' => 150000],
            ['id' => 4, 'name' => 'Topi', 'harga' => 25000],
            ['id' => 5, 'name' => 'Kaos Kaki', 'harga' => 10000]
        ];
    }
    
    public function dataProductView(){
        return response()->json($this->dataProduct());
    }
        
    public function show($id)
    {
        foreach ($this->dataProduct() as $data) {
            if ($data['id'] == (int) $id) {
                return response()->json($data);
            }
        }

        return response()->json([
            'message' => 'Produk tidak ditemukan'
        ], 404);
    }
}
