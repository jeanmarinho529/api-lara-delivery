<?php

namespace App\Models;

use App\Models\Driver\Driver;
use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    public const ACTIVE = 1;
    public const BLOCKED = 2;

    public $table = 'status';

    protected $fillable = [
        'name'
    ];

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class, 'status_id', 'id');
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class, 'status_id', 'id');
    }
}
