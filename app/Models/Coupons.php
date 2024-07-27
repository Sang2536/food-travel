<?php

namespace App\Models;

use App\Models\Casts\DateCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;
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
        'apply_for',
        'customer_use',
        'note',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [
        'start_day' => DateCustomCast::class,
        'last_day' => DateCustomCast::class,
    ];

    protected $type = [
        'customer_use' => 'array',
    ];

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }
}
