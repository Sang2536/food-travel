<?php

namespace App\Models;

use App\Models\Casts\DateCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected  $collection = 'transactions';

    protected $fillable = [
        'trans_id',
        'customer_id',
        'name',
        'type',
        'status',
        'total_amount',
        'tran_date',
        'products',
        'payment_log',
        'settings',
        'note',
        'created_by'
    ];

    protected $hidden = [];

    protected $casts = [
        'tran_date' => DateCustomCast::class,
    ];

    protected $type = [
        'total_amount' => 'decimal',
        'products' => 'object',
        'payment_log' => 'object',
        'settings' => 'object',
    ];

    public function customer() : BelongsTo {
        return $this->belongsTo(Account::class, 'customer_id', 'acc_id');
    }

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }
}
