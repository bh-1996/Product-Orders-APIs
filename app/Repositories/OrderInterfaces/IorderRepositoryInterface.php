<?php

namespace App\Repositories\OrderInterfaces;


interface IorderRepositoryInterface
{
    public function createOrder($request);
    public function getOrderById($request);
    // public function getOrderWithUser($request);
}
