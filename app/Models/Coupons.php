<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;

    protected  $collection = 'coupons';

    protected $fillable = [
        'cou_id',
        'name',
        'slug',
        'quantity',
        'type',
        'value',
        'start_day',
        'last_day',
        'customer_use',
        'note',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [];

    protected $type = [
        'customer_use' => 'array',
    ];

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }
}
