<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected  $collection = 'accounts';

    protected $fillable = [
        'acc_id',
        'slug',
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

    protected $type = [
        'logs' => 'object',
        'settings' => 'object',
    ];

    public function avatarUrl() : CastsAttribute {
        return CastsAttribute::get(fn() => Storage::disk('public')->url($this->avatar));
    }

    public function transactions() : HasMany {
        return $this->hasMany(Transaction::class, 'customer_id', 'acc_id');
    }
}
