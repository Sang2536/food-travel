<?php

namespace App\Models;

use App\Models\Casts\PhotoUrlCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $collection = 'products';

    protected $fillable = [
        'product_code',
        'name',
        'status',
        'type',
        'category_id',
        'brand_id',
        'unit_id',
        'slug',
        'avatar',
        'point_trans',
        'quantities',
        'prices',
        'media',
        'rates',
        'settings',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [
        'avatar' => PhotoUrlCustomCast::class,
    ];

    protected $type = [
        'quantities' => 'object',
        'prices' => 'object',
        'media' => 'object',
        'rates' => 'object',
        'settings' => 'object',
    ];

    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by', 'uid');
    }

    public function productCategory() : BelongsTo {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'pc_id');
    }

    public function brand() : BelongsTo {
        return $this->belongsTo(Brand::class, 'brand_id', 'bid');
    }
}
