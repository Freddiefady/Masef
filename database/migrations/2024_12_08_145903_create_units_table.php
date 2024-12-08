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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('compound');
            $table->string('location');
            $table->bigInteger('no_unit');
            $table->bigInteger('float_unit');
            $table->boolean('elevator');
            $table->bigInteger('distance_between_beach_and_unit');
            $table->boolean('distance_between_beach_unit');
            $table->bigInteger('distance_between_pool_and_unit');
            $table->boolean('distance_between_pool_unit');
            $table->json('Room_amenities');
            $table->date('available_booking_date');
            $table->text('policies_roles');
            $table->string('unit_price');
            $table->string('insurance_amount');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
