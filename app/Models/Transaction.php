<?php

namespace App\Models;

use App\Models\Casts\DateCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected  $collection = 'transactions';

    protected $fillable = [
        'trans_id',
        'name',
        'type',
        'status',
        'total_amount',
        'tran_date',
        'products',
        'settings',
    ];

    protected $hidden = [];

    protected $casts = [
        'tran_date' => DateCustomCast::class,
    ];

    protected $type = [
        // 'tran_date' => DateCustomCast::class,
        'total_amount' => 'decimal',
        'products' => 'object',
        'settings' => 'object',
    ];
}
