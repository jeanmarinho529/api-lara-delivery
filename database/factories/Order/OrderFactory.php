<?php

namespace Database\Factories\Order;

use App\Models\Driver\Driver;
use App\Models\Order\OrderStatus;
use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'external_number' => $this->faker->unique()->regexify('[A-Za-z0-9]{20}'),
            'client_name' => $this->faker->name(),
            'client_phone' => $this->faker->phoneNumber(),
            'client_lat' => $this->faker->latitude(),
            'client_long' => $this->faker->longitude(),
            'origin_lat' => $this->faker->latitude(),
            'origin_long' => $this->faker->longitude(),
            'note' => $this->faker->sentence(),
            'store_id' => Store::factory()->create()->id,
            'driver_id' => Driver::factory()->create()->id,
            'order_status_id' => OrderStatus::factory()->create()->id,
        ];
    }
}
