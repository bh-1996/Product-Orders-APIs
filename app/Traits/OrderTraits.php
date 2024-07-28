<?php

namespace App\Traits;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Services\Interfaces\IorderServices;

trait OrderTraits
{
    private $orderServices;

	public function __construct(IorderServices $orderServices)
	{
		 $this->orderServices = $orderServices;
	}

    public function createOrder(CreateOrderRequest $request)
	{
        return $this->orderServices->createOrder($request);
	}

	public function getOrderById($user_id)
    {
        return $this->orderServices->getOrderById($user_id);
    }
}