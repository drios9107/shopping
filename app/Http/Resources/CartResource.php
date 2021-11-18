<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\Shoe;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $shoe = Shoe::find($this->shoe_id);
        return [
            'id' => $this->id,
            'color' => $shoe->color,
            'size' => $shoe->size,
            'price' => $shoe->price,
            'brand' => $shoe->Brand->name,
            'user' => $this->user->id,
            'amount' => $this->amount,
            'value' => $this->value,
        ];
    }
}
