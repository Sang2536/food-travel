<?php
namespace App\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Support\Facades\Storage;

class PhotoUrlCustomCast implements CastsAttributes {
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }

    public function get($model, $key, $value, $attributes)
    {
        return Storage::disk('public')->url($value);
    }
}

