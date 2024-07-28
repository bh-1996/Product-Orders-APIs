<?php

namespace App\Services;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\CreateOrderResource;
use App\Http\Resources\OrderProductResourse;
use App\Http\Resources\OrderResource;
use App\Http\Resources\UserResource;
use App\Repositories\OrderInterfaces\IorderRepositoryInterface;
use App\Services\Interfaces\IorderServices;
use Exception;

class OrderServices implements IorderServices
{
    private $orderRepository;

    public function __construct(
        IorderRepositoryInterface $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(CreateOrderRequest $request)
    {
        try {
            $booking = $this->orderRepository->createOrder($request);
            return response()->json(['success' => true, 'data' => new CreateOrderResource($booking), 'message' => "Order confirm."]);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => 'Could not create Order! Something is wrong!']);
        }
    }
    public function getOrderById($user_id)
    {
        $order = $this->orderRepository->getOrderById($user_id);
        
        if (!$order->count() > 0) {
            return response()->json(['success' => false, 'message' => 'Order does not exist!']);
        }
        return response()->json(['success' => true, 'data' => OrderProductResourse::collection($order), 'message' => 'Fetch Order Details.']);
    }
}
