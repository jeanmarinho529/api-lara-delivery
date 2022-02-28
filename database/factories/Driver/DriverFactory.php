<?php

namespace Database\Factories\Driver;

use App\Enums\WhatsappEnum;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->unique()->regexify('[0-9]{11}'),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'is_whatsapp' => $this->faker->randomElement([WhatsappEnum::IS_WPP, WhatsappEnum::NOT_WPP]),
            'user_id' => User::factory()->create()->id,
            'status_id' => Status::ACTIVE,
        ];
    }
}
