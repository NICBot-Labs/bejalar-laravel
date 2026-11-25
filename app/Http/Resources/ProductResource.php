<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'harga_format' => 'Rp ' . number_format(
                $this->harga,
                0,
                ',',
                '.'
            ),
            'stok' => $this->stok,
            'category_id' => $this->category_id,
            'dibuat' => $this->created_at->format('d-m-Y'),
        ];
    }
}
