<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this);
        // return parent::toArray($request);
        return [

            "order_products" => [
                "order_product_id" => $this->id,
                // "orderId" => $this->order_id,
                // "user_id" => $this->user_id,
                // "product_id" => $this->product_id,
                // "total_price" => $this->total_price,
                // "quantity" => $this->quentity,
                // "created_at" => $this->created_at,
                // "updated_at" => $this->updated_at,
            ],
            'user_details' => UserResource::collection($this->users),

            // 'order_details' => OrderResource::collection($this->orders),
            // "product_details" => ProductResource::collection($this->products),

        ];
    }
}
