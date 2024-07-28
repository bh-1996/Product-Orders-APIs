<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

interface IorderServices
{
    public function createOrder(CreateOrderRequest $request);
	public function getOrderById($user_id);
	
}
