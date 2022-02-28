<?php

namespace App\Models\Order;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderStatus extends BaseModel
{
    public const SEARCHING = 1;
    public const FINISHED = 2;
    public const CANCELED = 3;
    public const DENIED = 4;

    public $table = 'order_status';

    protected $fillable = [
        'name',
        'description'
    ];

    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'order_status_id', 'id');
    }
}
