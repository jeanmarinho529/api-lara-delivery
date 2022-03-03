<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Order\Order;
use App\Services\Order\OrderService;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function store(StoreOrderRequest $request): Order
    {
        return $this->orderService->createOrder($request->all(), $request->header('Authorization'));
    }
}
