<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

}
