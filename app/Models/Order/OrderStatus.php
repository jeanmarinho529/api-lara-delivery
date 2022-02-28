<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use HasFactory, SoftDeletes;

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
}
