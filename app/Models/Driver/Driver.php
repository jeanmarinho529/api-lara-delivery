<?php

namespace App\Models\Driver;

use App\Helpers\ClearDataHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

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
}
