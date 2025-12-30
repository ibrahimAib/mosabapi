<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'bill_id' => $this->bill_id,
            'customer_id' => $this->customer_id,
            'title' => $this->title,
            'price' => $this->price,
            'amount' => $this->amount,
            'category' => $this->category,
            'sn' => $this->sn,
        ];
    }
}
