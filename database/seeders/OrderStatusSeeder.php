<?php

namespace Database\Seeders;

use App\Models\Order\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->status() as $status) {
            OrderStatus::firstOrCreate($status);
        }
    }

    public function status(): array
    {
        return [
            [
                'id' => OrderStatus::SEARCHING,
                'name' => 'Procurando',
                'description' => 'Procurando um motorista para realizar a entrega.'
            ], [
                'id' => OrderStatus::FINISHED,
                'name' => 'Finalizada',
                'description' => 'Entrega realizada com sucesso.'
            ], [
                'id' => OrderStatus::CANCELED,
                'name' => 'Cancelada',
                'description' => 'Entrega cancelada.'
            ], [
                'id' => OrderStatus::DENIED,
                'name' => 'Recusada',
                'description' => 'Cliente recusou o conteúdo da entrega.'
            ]
        ];
    }
}
