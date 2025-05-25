<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_items,
            'item_name' => $this->item_name,
            'item_image' => $this->item_image,
            'code_items' => $this->code_items,
            'category' => $this->category->category_name,
            'stock' => $this->stock,
            'brand' => $this->brand,
            'status' => $this->status,
            'item_condition' => $this->item_condition
        ];
    }
}
