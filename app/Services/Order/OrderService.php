<?php

namespace App\Services\Order;

use App\Models\Order\Order;
use App\Models\Order\OrderStatus;
use App\Models\Store\Store;
use Illuminate\Support\Facades\Cache;

class OrderService
{
    public function createOrder(array $param, $apiKey): Order
    {
        return Order::firstOrCreate([
                'external_number' => $param['external_number'],
                'store_id' => $this->storeFindApiKey($apiKey)->id,
            ], [
                'client_name' => $param['client']['name'],
                'client_phone' => $param['client']['phone'],
                'client_lat' => $param['client']['lat'],
                'client_long' => $param['client']['long'],
                'origin_lat' => $param['origin']['lat'],
                'origin_long' => $param['origin']['long'],
                'note' => $param['note'],
                'order_status_id' => OrderStatus::SEARCHING,
            ]
        );
    }

    public function storeFindApiKey(string $apiKey): ?Store
    {
        return Cache::rememberForever('store.api_key.' . $apiKey, function () use ($apiKey) {
            return Store::where('api_key', $apiKey)->first();
        });
    }
}
