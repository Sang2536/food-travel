<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
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

    protected $type = [
        'quantities' => 'object',
        'prices' => 'object',
        'media' => 'object',
        'rates' => 'object',
        'settings' => 'object',
    ];

    public function avatarUrl() : CastsAttribute {
        return CastsAttribute::get(fn() => Storage::disk('public')->url($this->avatar));
    }
}
