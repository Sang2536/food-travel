<?php

namespace App\Models;

use App\Models\Casts\PhotoUrlCustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected  $collection = 'accounts';

    protected $fillable = [
        'acc_id',
        'qr_code',
        'display_name',
        'login_name',
        'email',
        'password',
        'remember_token',
        'avatar',
        'address',
        'phone',
        'status',
        'descr',
        'logs',
        'settings',
    ];

    protected $hidden = [
        'login_name',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'avatar' => PhotoUrlCustomCast::class,
    ];

    protected $type = [
        'logs' => 'object',
        'settings' => 'object',
    ];
}
