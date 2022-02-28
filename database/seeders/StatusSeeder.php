<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->status() as $status) {
            Status::firstOrCreate($status);
        }
    }

    public function status(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Ativo',
            ], [
                'id' => 2,
                'name' => 'Bloqueado'
            ]
        ];
    }
}
