<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected  $connection = 'mongodb';

    protected  $collection = 'users';

    protected $fillable = [
        'uid',
        'name',
        'email',
        'password',
        'email_verified_at',
        'status',
        'avatar',
        'roles',
        'logs',
        'settings',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $type = [
        'email_verified_at' => 'date',
        'roles' => 'object',
        'logs' => 'object',
        'settings' => 'object',
    ];

    public function avatarUrl() : CastsAttribute {
        return CastsAttribute::get(fn() => Storage::disk('public')->url($this->avatar));
    }

    public function brands() : HasMany {
        return $this->hasMany(Brand::class, 'created_by', 'uid');
    }

    public function coupons() : HasMany {
        return $this->hasMany(Coupons::class, 'created_by', 'uid');
    }

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'created_by', 'uid');
    }

    public function productCategories() : HasMany {
        return $this->hasMany(ProductCategory::class, 'created_by', 'uid');
    }

    public function transactions() : HasMany {
        return $this->hasMany(Transaction::class, 'created_by', 'uid');
    }

    public function units() : HasMany {
        return $this->hasMany(Unit::class, 'created_by', 'uid');
    }
}
