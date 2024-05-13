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
        Schema::create('accounts', function (Blueprint $collection) {
            $collection->id();
            $collection->unique('acc_id');
            $collection->index('qr_code');
            $collection->index('auth');
            $collection->index('info');
            $collection->index('point');
            $collection->index('logs');
            $collection->index('settings');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
