<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
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

    protected $type = [
        'settings' => 'object',
    ];

    public function avatarUrl() : CastsAttribute {
        return CastsAttribute::get(fn() => Storage::disk('public')->url($this->avatar));
    }
}
