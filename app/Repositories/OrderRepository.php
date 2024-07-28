<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use App\Repositories\OrderInterfaces\IorderRepositoryInterface;

class OrderRepository implements IorderRepositoryInterface
{

   public function model()
   {
      return Order::class;
   }

   public function createOrder($request)
   {
      // dd($request->all());
      $price = Product::where('id', $request->product_id)->sum('price');
      // dd($price);

      $orderDetails = [
         'order_id' =>  Str::uuid()->toString(),
         'user_id' => $request->user_id,
         'product_id' => $request->product_id,
         'quentity' => $request->quantity,
         'total_price' => $price * $request->quantity
      ];
      // dd($orderDetails);
      $order = Order::create($orderDetails);
      // return $order;
      $orderProduct = [
              'order_id' => $order->id,
              'product_id' => $request->product_id,
              'quantity' => $request->quantity,
              'total_price' => $price * $request->quantity,
              'user_id' => $request->user_id,
           ];
         //   dd($orderProduct);
          OrderProduct::create($orderProduct);
         //   $orderProduct = new OrderProduct();
         //   $orderProduct->order_id = $order->id;
         //   $orderProduct->product_id = $request->product_id;
         //   $orderProduct->quantity = $request->quantity;
         //   $orderProduct->total_price = $price * $request->quantity;
         //    $orderProduct->save();
           return $order;
   }
   public function getOrderById($request)
   {
      // dd($request->all());
      $order = OrderProduct::where('user_id', $request->user_id)
      ->with('users','products','orders')->get();
// dd($order);
      // $order = User::where('id', $request->user_id)->with('userOrders','products')->get();
      return $order;
   }

   public function getOrderWithUser()
   {
      // return Order::where('user_id',$request->user_id)->with('products','users')->get();
   }
}
