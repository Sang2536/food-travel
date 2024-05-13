<?php

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $collection) {
            $collection->id();
            $collection->unique('pid');
            $collection->index('qr_code');
            $collection->index('name');
            $collection->index('type', options: ['single', 'combo', 'variable']);
            $collection->index('category');
            $collection->index('brand');
            $collection->index('unit');
            $collection->index('point_trans');
            $collection->index('quantities');
            $collection->index('prices');
            $collection->index('media');
            $collection->index('rates');
            $collection->index('settings');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
