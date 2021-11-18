<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $brand = Brand::find($this->brand_id);
        return [
            'id' => $this->id,
            'color' => $this->color,
            'size' => $this->size,
            'price' => $this->price,
            'brand' => $brand->name,
        ];
    }
}
