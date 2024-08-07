<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateOrderResource extends JsonResource
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
            "order_details" => [
                "id" => $this->id,
                "order_id" => $this->order_id,
                "user_id" => $this->user_id,
                "product_id" => $this->product_id,
                "total_price" => $this->total_price,
                "quantity" => $this->quentity,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ],
            "user_details" => new AdminResource($this->users),
        ];
    }
}
