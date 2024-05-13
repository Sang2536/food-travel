<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected  $collection = 'systems';

    protected $fillable = [
        'domain',
        'app_name',
        'app_title',
        'favicon',
        'logo',
        'language',
        'styles',
    ];

    protected $hidden = [];

    protected $type = [
        'styles' => 'object',
    ];
}
