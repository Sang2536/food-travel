<?php
namespace App\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DateCustomCast implements CastsAttributes {
    public function set($model, $key, $value, $attributes)
    {
        return $value->format('Y-m-d\TH:i:s.v\Z');
    }

    public function get($model, $key, $value, $attributes)
    {
        return $value->format('Y-m-d H:i:s');
    }
}

