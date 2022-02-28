<?php

namespace Database\Factories\Store;

use App\Enums\WhatsappEnum;
use App\Models\Status;
use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'trading_name' => $this->faker->name(),
            'company_name' => $this->faker->name(),
            'cnpj' => $this->faker->unique()->regexify('[0-9]{14}'),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'is_whatsapp' => $this->faker->randomElement([WhatsappEnum::IS_WPP, WhatsappEnum::NOT_WPP]),
            'lat' => $this->faker->latitude(),
            'long' => $this->faker->longitude(),
            'status_id' => Status::ACTIVE,
        ];
    }
}
