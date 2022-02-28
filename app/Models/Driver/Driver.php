<?php

namespace App\Models\Driver;

use App\Helpers\ClearDataHelper;
use App\Models\BaseModel;
use App\Models\Order\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends BaseModel
{
    public $table = 'drivers';

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'phone',
        'is_whatsapp',
        'user_id',
        'status_id'
    ];

    protected $casts = [
        'is_whatsapp' => 'boolean'
    ];

    public function setPhoneAttribute(string $value): void
    {
        $this->attributes['phone'] = ClearDataHelper::clearAttribute($value);
    }

    public function setCpfAttribute(string $value): void
    {
        $this->attributes['cpf'] = ClearDataHelper::clearAttribute($value);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }
}
