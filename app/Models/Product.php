<?php

namespace App\Models;

use App\Models\Casts\PhotoUrlCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $collection = 'products';

    protected $fillable = [
        'pid',
        'qr_code',
        'name',
        'avatar',
        'status',
        'type',
        'category',
        'brand',
        'unit',
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
}
