<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryShowResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'products' => ShowCategoryProductResource::collection($this->products) ?? null,
            'Total_products' => $this->products->count() ?? null, // ?? null study conditions if it has it show. If it doesn't has it show null.
        ];
    }
}
