<?php

namespace Database\Seeders;

use App\Enums\WhatsappEnum;
use App\Models\Driver\Driver;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        Driver::firstOrCreate([
            'name' => 'Driver Test',
            'cpf' => '00000000000',
            'email' => 'driver@test.com',
            'phone' => '84900000000',
            'is_whatsapp' => WhatsappEnum::IS_WPP,
            'user_id' => User::first()->id,
            'status_id' => Status::ACTIVE
        ]);
    }
}
