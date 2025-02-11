<?php

namespace App\Http\Resources\V1;

use App\Models\Bill;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'customer' => $this->customer ? $this->customer->name : 'العميل محذوف' ,
            'overAll' => $this->overAll,
            'createdAt' => $this->created_at,
            'paid' => $this->paid,
            'cart' => CartResource::collection($this->carts)
        ];
    }
}
