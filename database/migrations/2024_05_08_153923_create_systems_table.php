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
        Schema::create('systems', function (Blueprint $collection) {
            $collection->id();
            $collection->index('domain');
            $collection->index('app_name');
            $collection->index('app_title');
            $collection->index('favicon');
            $collection->index('logo');
            $collection->index('language');
            $collection->index('styles');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systems');
    }
};
