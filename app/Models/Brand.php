<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected  $collection = 'brands';

    protected $fillable = [
        'bid',
        'name',
        'address',
        'phone',
        'email',
        'slug',
        'avatar',
        'short_descr',
        'note',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [];

    protected $type = [];

    public function avatarUrl() : CastsAttribute {
        return CastsAttribute::get(fn() => Storage::disk('public')->url($this->avatar));
    }

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'brand_id', 'bid');
    }

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }
}
