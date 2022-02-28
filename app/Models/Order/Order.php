<?php

namespace App\Models\Order;

use App\Helpers\ClearDataHelper;
use App\Models\BaseModel;
use App\Models\Driver\Driver;
use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends BaseModel
{
    public $table = 'orders';

    protected $fillable = [
        'external_number',
        'client_name',
        'client_phone',
        'client_lat',
        'client_long',
        'origin_lat',
        'origin_long',
        'note',
        'store_id',
        'driver_id',
        'order_status_id',
    ];

    public function setClientNameAttribute(string $value): void
    {
        $this->attributes['client_name'] = ucwords($value);
    }

    public function setClientPhoneAttribute(?string $value): void
    {
        $this->attributes['client_phone'] = ClearDataHelper::clearAttribute($value);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
}
