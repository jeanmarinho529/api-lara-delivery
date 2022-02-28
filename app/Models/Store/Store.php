<?php

namespace App\Models\Store;

use App\Helpers\ClearDataHelper;
use App\Helpers\FormartDataHelper;
use App\Models\BaseModel;
use App\Models\Order\Order;
use App\Models\Status;
use App\Models\User;
use App\Traits\PhoneModelTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends BaseModel
{
    use PhoneModelTrait;

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

    protected $appends = [
        'display_cnpj',
        'display_phone'
    ];

    public function setCnpjAttribute(string $value): void
    {
        $this->attributes['cnpj'] = ClearDataHelper::clearAttribute($value);
    }

    public function getDisplayCnpjAttribute(): string
    {
        return FormartDataHelper::formartCpf($this->cnpj);
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
        return $this->hasMany(Order::class, 'store_id', 'id');
    }
}
