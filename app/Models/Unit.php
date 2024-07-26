<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected  $collection = 'units';

    protected $fillable = [
        'un_id',
        'name',
        'abbr',
        'short_descr',
        'note',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [];

    protected $type = [];

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'unit_id', 'un_id');
    }

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }
}
