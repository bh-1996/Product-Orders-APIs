<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    // private $data;
    // public function __construct($datas, $values)
    // {
    //     $this->data = $datas;
    // }

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
            "order_id" => $this->id,
            "orderId" => $this->order_id,
            // "user_id" => $this->user_id,
            // "product_id" => $this->product_id,
            // "total_price" => $this->total_price,
            // "quantity" => $this->quentity,
            // "created_at" => $this->created_at,
            // "updated_at" => $this->updated_at,
            "product_details" => ProductResource::collection($this->products),
        ];
    }
}
