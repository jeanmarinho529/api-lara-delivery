<?php

namespace Database\Seeders;

use App\Enums\WhatsappEnum;
use App\Models\Status;
use App\Models\Store\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        Store::firstOrCreate([
            'trading_name' => 'Test Company',
            'company_name' => 'Test Company LTDA',
            'cnpj' => '00000000000000',
            'email' => 'company@test.com',
            'phone' => '84900000000',
            'is_whatsapp' => WhatsappEnum::IS_WPP,
            'lat' => '-5.1952329',
            'long' => '-37.4116812',
            'status_id' => Status::ACTIVE
        ]);
    }
}
