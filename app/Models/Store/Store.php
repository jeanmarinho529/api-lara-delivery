<?php

namespace App\Models\Store;

use App\Helpers\ClearDataHelper;
use App\Models\BaseModel;
use App\Models\Order\Order;
use App\Models\Status;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends BaseModel
{
    public $table = 'stores';

    protected $fillable = [
        'trading_name',
        'company_name',
        'cnpj',
        'email',
        'phone',
        'is_whatsapp',
        'lat',
        'long',
        'api_key',
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

    public function setCnpjAttribute(string $value): void
    {
        $this->attributes['cnpj'] = ClearDataHelper::clearAttribute($value);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'store_id', 'id');
    }
}
