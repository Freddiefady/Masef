<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('days_sales');
            $table->bigInteger('discount_rate');
            $table->boolean('special_prices')->nullable();
            $table->bigInteger('booking_period')->nullable();
            $table->bigInteger('holiday_price')->nullable();
            $table->foreignId('unit_id')->nullable()->constrained('units')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
