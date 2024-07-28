<?php

namespace App\Repositories;

use App\Http\Resources\OrderProductResourse;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use App\Repositories\OrderInterfaces\IorderRepositoryInterface;
use Illuminate\Support\Facades\Log;

class OrderRepository implements IorderRepositoryInterface
{

   public function model()
   {
      return Order::class;
   }

   public function createOrder($request)
   {
       try {
           // Get the price of the product
           $price = Product::where('id', $request->product_id)->sum('price');
   
           // Prepare order details
           $orderDetails = [
               'order_id' => Str::uuid()->toString(),
               'user_id' => $request->user_id,
               'product_id' => $request->product_id,
               'quantity' => $request->quantity,
               'total_price' => $price * $request->quantity
           ];
   
           // Create the order
           $order = Order::create($orderDetails);
           // Prepare order product details
           $orderProduct = [
               'order_id' => $order->id,
               'product_id' => $request->product_id,
               'quantity' => $request->quantity,
               'total_price' => $price * $request->quantity,
               'user_id' => $request->user_id,
           ];
         //   dd($orderProduct);
   
           // Create the order product
           OrderProduct::create($orderProduct);
   
           return $order;
   
       } catch (\Exception $e) {
           // Log the exception message for debugging
           Log::error('Order creation failed: ' . $e->getMessage());
           // Return a response with an error message
           return response()->json([
               'success' => false,
               'message' => 'Could not create order. Please try again later.'
           ], 500);
       }
   }
   
   public function getOrderById($user_id)
   {
       try {
           // Fetch orders based on the user_id
           $orders = OrderProduct::where('user_id', $user_id)
                       ->with(['users', 'products', 'orders'])
                       ->get();
   
           // Debugging to check the contents and type of $orders
           // dd($orders);
   
           // Check if any orders were found
           if ($orders->isEmpty()) { // Ensure this is indeed an Eloquent Collection
               return response()->json([
                   'success' => false,
                   'message' => 'No orders found for the provided user ID.'
               ], 404); // Not Found status code
           }
   
           // Return the orders using the resource collection
           return response()->json([
               'success' => true,
               'orders' => OrderResource::collection($orders)
           ]);
   
       } catch (\Exception $e) {
           // Log the exception or handle it as needed
           return response()->json([
               'success' => false,
               'message' => 'An error occurred while fetching the orders.',
               'error' => $e->getMessage()
           ], 500); // Internal Server Error status code
       }
   }
   

   
   

   public function getOrderWithUser()
   {
      // return Order::where('user_id',$request->user_id)->with('products','users')->get();
   }
}
