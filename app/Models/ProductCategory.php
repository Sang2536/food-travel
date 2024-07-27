<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;


class ProductCategory extends Model
{
    use HasFactory;

    protected  $collection = 'product_categories';

    protected $fillable = [
        'pc_id',
        'name',
        'parent_id',
        'level',
        'slug',
        'keywords',
        'short_descr',
        'note',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [];

    protected $type = [
        'keywords' => 'array',
    ];

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'category_id', 'pc_id');
    }

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }
}
