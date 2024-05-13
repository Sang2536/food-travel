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
        Schema::create('transactions', function (Blueprint $collection) {
            $collection->id();
            $collection->unique('tran_id');
            $collection->index('name');
            $collection->index('type', ['purchase', 'sell']);
            $collection->index('status', ['done', 'order', 'transport']);
            $collection->index('total_amount');
            $collection->index('currency_unit');
            $collection->index('products');
            $collection->index('settings');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
