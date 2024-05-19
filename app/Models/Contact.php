<?php

namespace App\Models;

use App\Models\Casts\PhotoUrlCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected  $collection = 'contacts';

    protected $fillable = [
        'cid',
        'display_name',
        'email',
        'avatar',
        'address',
        'phone',
        'status',
        'type',
        'source',
        'descr',
        'settings',
        'created_by',
    ];

    protected $hidden = [];

    protected $casts = [
        'avatar' => PhotoUrlCustomCast::class,
    ];

    protected $type = [
        'settings' => 'object',
    ];
}
