<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "order_id" => $this->id,
            "orderId" => $this->order_id,
            "user_id" => $this->user_id, // If you want to include this
            "total_price" => $this->total_price,
            "quantity" => $this->quantity,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "product_details" => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
