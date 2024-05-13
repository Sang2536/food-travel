<?php

namespace App\Models;

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

    protected $type = [
        'tran_date' => 'date',
        'total_amount' => 'decimal',
        'products' => 'object',
        'settings' => 'object',
    ];
}
