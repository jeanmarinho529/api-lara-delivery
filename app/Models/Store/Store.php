<?php

namespace App\Models\Store;

use App\Helpers\ClearDataHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

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
}
